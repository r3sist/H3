<?php declare(strict_types = 1);
// H3 - Static helpers for Fatfree Framework
// Static helpers
// (c) resist | https://github.com/r3sist/h3

use resist\H3\Md;

class H3
{
    /** @param mixed $var */
    public static function dump($var): void
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }

    public static function render(string $template): void
    {
        $regex = "/([^A-Za-z0-9_\\\\\-\/])+/u";
        $template = preg_replace($regex, '', $template);
        echo \Template::instance()->render($template.'.html');
    }

    public static function gen(int $length): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $key = '';
         for ($p = 0; $p < $length; $p++) {
            $key .= $characters[random_int(0, strlen($characters) - 1)];
         }
         return (string)$key;
    }

    public static function shorten(string $string, int $length, string $extend = '&hellip;'): string
    {
        if (strlen ($string) > 0) {
            if (strlen ($string) > $length) {
                return substr($string, 0, $length).$extend;
            }
            return $string;
        }
        return '';
    }

    /**
     * @deprecated Probably dead code
     */
    public static function keyDown(array $array, $keyNumber): array
    {
        if (count($array)-1 > $keyNumber) {
            $brray = array_slice($array,0,$keyNumber,true);
            $brray[] = $array[$keyNumber+1];
            $brray[] = $array[$keyNumber];
            $brray += array_slice($array,$keyNumber+2,count($array),true);
            return((array)$brray);
        }

        return $array;
    }

    /**
     * @deprecated Probably dead code
     */
    public static function keyUp(array $array, $keyNumber): array
    {
        if ($keyNumber > 0 and $keyNumber < count($array)) {
            $brray = array_slice($array,0,($keyNumber-1),true);
            $brray[] = $array[$keyNumber];
            $brray[] = $array[$keyNumber-1];
            $brray += array_slice($array,($keyNumber+1),count($array),true);
            return((array)$brray);
        }

        return $array;
    }

    /**
     * @deprecated Use Json class instead
     * @throws Exception
     */
    public static function getJson(string $url): array
    {
        $json = new \resist\H3\Json(\Web::instance());
        return $json->getJsonFromUrlAsArray($url);
    }

    public static function n0(float $number): int
    {
        return (int)number_format($number, 0, '.', '');
    }

    public static function n1(float $number): float
    {
        return (float)number_format($number, 1, '.', '');
    }

    public static function n2(float $number): float
    {
        return (float)number_format($number, 2, '.', '');
    }

    public static function n3(float $number): float
    {
        return (float)number_format($number, 3, '.', '');
    }

    public static function n4(float $number): float
    {
        return (float)number_format($number, 4, '.', '');
    }

    /**
     * Returns converted md; HTML in input is cleaned; output is filtered by allowed tags
     * @deprecated Use Md class instead
     * @param string $string Input
     * @param string $allowedTags // Comma separated list of allowed tags
     * @return string // Cleaned and converted output string
     */
    public static function makeMdStrict(string $string, string $allowedTags = ''): string
    {
        return (new Md(\Base::instance(), \Markdown::instance()))->makeOneLine($string);
    }

    /**
     * Returns converted md; HTML in input is cleaned
     * @deprecated Use Md class instead
     * @param string $string
     * @return string
     */
    public static function makeMdLight(string $string): string
    {
        return (new Md(\Base::instance(), \Markdown::instance()))->makeWithoutHtml($string);
    }

    /**
     * @deprecated Use Md class instead
     * @param string $string
     * @return string
     */
    public static function makeMd(string $string): string
    {
        return (new Md(\Base::instance(), \Markdown::instance()))->makeMd($string);
    }

    /** @param int|float|string $string */
    public static function slug($string): string
    {
        return \Web::instance()->slug((string)$string);
    }
}
