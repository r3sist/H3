<?php
/**
 * H3/Dirtydoc - Quick markdown documentation of class public methods
 * (c) 2020 resist | https://resist.hu
 *
 * Based on https://github.com/kamermans/docblock-reflection/
 */

namespace resist\H3;

use JsonException;
use ReflectionClass;
use ReflectionException;
use ReflectionMethod;
use ReflectionProperty;
use RuntimeException;

class Dirtydoc
{
    private ReflectionClass $reflection;

    /**
     * @throws ReflectionException
     */
    public function __construct(string $classNameWithNamespace)
    {
        $this->reflection = new ReflectionClass($this->verifyClassName($classNameWithNamespace));
    }

    public function getNamespace(): string
    {
        return $this->reflection->getNamespaceName();
    }

    public function getClassName(): string
    {
        return $this->reflection->getShortName();
    }

    /**
     * @throws JsonException|ReflectionException
     */
    public function getClassMatrix(): array {
        return [
            'namespace' => $this->getNamespace(),
            'className' => $this->getClassName(),
            'publicMethods' => $this->getPublicMethodList(),
            'publicProperties' => $this->getPublicPropertyList(),
            'constructParameters' => $this->getMethodParameterMatrix('__construct'),
        ];
    }

    public function getPublicMethodList(): array
    {
        $methods = $this->reflection->getMethods(ReflectionMethod::IS_PUBLIC);

        $methodNames = array_column($methods, 'name');
        sort($methodNames);

        return $methodNames;
    }

    public function getPublicPropertyList(): array
    {
        $properties = $this->reflection->getProperties(ReflectionProperty::IS_PUBLIC);

        return array_column($properties, 'name');
    }

    /**
     * @throws ReflectionException
     */
    public function getPropertyType(string $propertyName): string
    {
        return $this->reflection->getProperty($propertyName)->getType()->getName()??'';
    }

    /**
     * @throws JsonException|ReflectionException
     */
    public function getMethodParameterMatrix(string $methodName): array
    {
        $parameterMatrix = [];

        foreach ($this->reflection->getMethod($methodName)->getParameters() as $parameter) {
            $matrixData['name'] = $parameter->getName();
            $matrixData['type'] = '';
            $matrixData['optional'] = $parameter->isOptional();
            $matrixData['defaultValue'] = '';
            if ($matrixData['optional']) {
                $defaultValue = $parameter->getDefaultValue();
                $matrixData['defaultValue'] = '"'.$parameter->getDefaultValue().'"';
                if ($parameter->getDefaultValue() === '') {
                    $matrixData['defaultValue'] = '`empty string`';
                }
                if (is_array($parameter->getDefaultValue())) {
                    $matrixData['defaultValue'] = ''.json_encode($parameter->getDefaultValue(), JSON_THROW_ON_ERROR|JSON_UNESCAPED_UNICODE);
                }
                if ($parameter->getDefaultValue() === true) {
                    $matrixData['defaultValue'] = '`true`';
                }
                if ($parameter->getDefaultValue() === false) {
                    $matrixData['defaultValue'] = '`false`';
                }
                if (is_numeric($defaultValue)) {
                    $matrixData['defaultValue'] = $parameter->getDefaultValue();
                }

            }
            if ($parameter->getType() !== null) {
                    $matrixData['type'] = $parameter->getType()->getName();
            }

            $parameterMatrix[] = $matrixData;
        }

        return $parameterMatrix;
    }

    /**
     * @throws ReflectionException
     */
    public function getMethodReturnType(string $methodName): string
    {
        $type = $this->reflection->getMethod($methodName)->getReturnType();
        if ($type !== null) {
            return $this->reflection->getMethod($methodName)->getReturnType()->getName();
        }

        return '';
    }

    /**
     * @throws ReflectionException
     */
    public function getMethodParsedDocblock(string $methodName): array
    {
        return $this->parseMethodDocblock($this->getMethodDocblock($methodName));
    }

    /**
     * @throws JsonException|ReflectionException
     */
    public function getMarkdownDocumentation(): string
    {
        // Header
        $md = "# ".$this->getClassName()."\n\n";

        $classDocblockData = $this->parseMethodDocblock($this->getClassDocblock());
        $md .= ($classDocblockData['description']?'> '.$classDocblockData['description']:'')."\n\n";

        $md .= "Auto generated public API documentation of class ***".$this->getNamespace().'\\'.$this->getClassName()."*** at ".date('Y.m.d.')."\n\n";

        // Public properties
        $properties = $this->getPublicPropertyList();
        if (!empty($properties)) {
            $md .= "## Public properties \n\n";

            $md .= "| Type | Property name |\n| --- | --- |\n";

            foreach ($properties as $propertyName) {
                $md .= '| '.$this->formatType($this->getPropertyType($propertyName)).' | **$'.$propertyName.'** |'."\n";
            }
        }

        // Public methods
        $methods = $this->getPublicMethodList();
        $md .= "## Public methods \n\n";

        foreach ($methods as $methodName) {
            $docblockData = $this->getMethodParsedDocBlock($methodName);

            $parameterMatrix = $this->getMethodParameterMatrix($methodName);
            $md .= "### ".$methodName."()\n\n";

            if (isset($docblockData['deprecated'])) {
                $md .= "**DEPRECATED** ".$docblockData['deprecated']."\n\n";
            }

            $md .= "".($docblockData['description']?"> ".$docblockData['description']."\n\n":'');
            $md .= "**".$methodName."(** ".$this->formatParameterString($parameterMatrix)." **):** ".$this->formatType($this->getMethodReturnType($methodName))."\n\n";

            if (!empty($parameterMatrix)) {
                $md .= "| Type | Parameter name | Default value | Description |\n| --- | --- | --- | --- |\n";
                foreach ($parameterMatrix as $parameterData) {
                    // Type
                    $md .= '| ';
                    if ($parameterData['type'] !== '') {
                        $md .= $this->formatType($parameterData['type']);
                    } else if (isset($docblockData['params'][$parameterData['name']])) {
                        $md .= '@'.str_replace('|', ',', $docblockData['params'][$parameterData['name']]['type']).'';
                    }
                    // Name
                    $md .= ' | **$'.$parameterData['name'].'**';
                    // Default value
                    $md .= ' | '.$parameterData['defaultValue'];
                    // Description
                    $md .= ' | '.(isset($docblockData['params'][$parameterData['name']])?$docblockData['params'][$parameterData['name']]['description']:'').' |'."\n";
                }
            }

            if (isset($docblockData['return'])) {
                $returnPieces = explode(' ', $docblockData['return'], 2);
                $md .= "Returns: ".$this->formatType($this->getMethodReturnType($methodName)).' ';
                if ($this->getMethodReturnType($methodName) === '' && in_array($returnPieces[0], ['array', 'mixed', 'object', 'int', 'float', 'double', 'string', 'null', 'void'])) {
                    $md .= $docblockData['return']."\n\n";
                } else {
                    $md .= $returnPieces[1]."\n\n";
                }

            }
        }

        return $md;
    }

    /**
     * @throws JsonException|ReflectionException
     */
    public function generateMarkdownFile(string $fileName): void
    {
        file_put_contents($fileName, $this->getMarkdownDocumentation());
    }

    // API END

    private function verifyClassName(string $className): string
    {
        if (preg_match('/^[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*(\\\\[a-zA-Z_\x80-\xff][a-zA-Z0-9_\x80-\xff]*)*$/', $className)) {
            return $className;
        }

        throw new RuntimeException('Invalid class name');
    }

    private function formatType(string $typeName): string
    {
        if (in_array($typeName, ['', 'string', 'null', 'array', 'int', 'bool', 'double', 'float', 'void'])) {
            if ($typeName === '') {
                return '' ;
            }
            return '`'.$typeName.'` ';
        }

        return '*'.$typeName.'*';
    }

    private function formatParameterString(array $methodParameterMatrix): string
    {
        $count = count($methodParameterMatrix);

        $result = '';

        $i = 1;
        foreach ($methodParameterMatrix as $parameterData) {
            $result .= ($parameterData['optional']?'[':'');
            $result .= $this->formatType($parameterData['type']).' $'.$parameterData['name'];
            $result .= ($parameterData['optional']?']':'');
            $result .= ($i < $count?', ':'');
            $i++;
        }

        return $result;
    }

    /**
     * @throws ReflectionException
     */
    private function getMethodDocblock(string $methodName): string
    {
        return $this->reflection->getMethod($methodName)->getDocComment();
    }

    private function getClassDocblock(): string
    {
        return $this->reflection->getDocComment();
    }

    private function parseMethodDocblock(string $docblock): array
    {
        $result = [
            'description' => '',
            'tags' => []
        ];

        $docblock = str_replace("\r\n", "\n", $docblock);
        $lines = explode("\n", $docblock);

        switch (count($lines)) {
            case 1:
                // handle single-line docblock
                if (!preg_match('#\\/\\*\\*([^*]*)\\*\\/#', $lines[0], $matches)) {
                    $array['description'] = $matches;
                    return $array;
                }
                // remove start-end characters
                $lines[0] = substr($lines[0], 3, -2);
                break;
            case 2:
                // probably malformed
                return [];
            default:
                // handle multi-line docblock, remove first and last lines
                array_shift($lines);
                array_pop($lines);
                break;
        }

        foreach ($lines as $line) {
            $line = preg_replace('#^[ \t\*]*#', '', $line);
            if (strlen($line) < 2) {
                continue;
            }
            if (preg_match('#@([^ ]+)(.*)#', $line, $matches)) {
                $tagName = $matches[1];
                $tagValue = trim($matches[2]);

                switch ($tagName) {
                    case 'param':
                        $beforeDollar = explode('$', $tagValue, 2);
                        $type = $beforeDollar[0];
                        $afterDollar = explode(' ', $beforeDollar[1], 2);
                        [$name, $desc] = $afterDollar;
                        $result['params'][$name] = ['type' => $type, 'description' => $desc];
                        break;
                    case 'deprecated':
                        $result['deprecated'] = $tagValue;
                        break;
                    case 'return':
                        $result['return'] = $tagValue;
                        break;
                    default:
                        $result['tags'][] = [$tagName => $tagValue];
                }
                continue;
            }
            $result['description'].= trim($line)."  \n";
        }
        return $result;
    }
}
