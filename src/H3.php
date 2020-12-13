<?php declare(strict_types = 1);
/**
 * H3 - Static helpers for Fatfree Framework
 * (c) 2020 resist | https://resist.hu | https://github.com/r3sist/h3
 */

use resist\H3\Json;
use resist\H3\Md;

/** Static helpers for Fatfree Framework */
class H3
{
    /**
     * Variable dumper with pre tags
     * @param mixed $var
     */
    public static function dump($var): void
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }

    /**
     * Renders template file via Fatfree Framework: Template
     * @param string $template Template file name without '.html'. E.g.: 'layout' or 'subdir/layout'
     */
    public static function render(string $template): void
    {
        $regex = "/([^A-Za-z0-9_\\\\\-\/])+/u";
        $template = preg_replace($regex, '', $template);

        header('HX-Trigger: {"'.(\Base::instance()->get('ALIAS')?:'settle').'": true}');

        echo \Template::instance()->render($template.'.html');
    }

    /**
     * Generates alpha-numeric random string
     * @param int $length Length of string
     * @throws Exception
     */
    public static function gen(int $length): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $key = '';
         for ($p = 0; $p < $length; $p++) {
            $key .= $characters[random_int(0, strlen($characters) - 1)];
         }
         return $key;
    }

    /**
     * Shortens string and extends with mark if original string is longer than given limit
     */
    public static function shorten(string $string, int $length, string $extend = '&hellip;'): string
    {
        if ($string !== '') {
            if (strlen($string) > $length) {
                return substr($string, 0, $length).$extend;
            }

            return $string;
        }

        return '';
    }

    /**
     * @deprecated Probably dead code
     */
    public static function keyDown(array $array, int $keyNumber): array
    {
        if (count($array)-1 > $keyNumber) {
            $brray = array_slice($array,0,$keyNumber, true);
            $brray[] = $array[$keyNumber+1];
            $brray[] = $array[$keyNumber];
            $brray += array_slice($array, $keyNumber+2, count($array), true);
            return $brray;
        }

        return $array;
    }

    /**
     * @deprecated Probably dead code
     */
    public static function keyUp(array $array, int $keyNumber): array
    {
        if ($keyNumber > 0 && $keyNumber < count($array)) {
            $brray = array_slice($array, 0, ($keyNumber-1), true);
            $brray[] = $array[$keyNumber];
            $brray[] = $array[$keyNumber-1];
            $brray += array_slice($array, ($keyNumber+1), count($array), true);
            return $brray;
        }

        return $array;
    }

    /**
     * @deprecated Use Json class instead
     * @throws Exception
     */
    public static function getJson(string $url): array
    {
        return (new Json(Web::instance(), Audit::instance()))->getJsonFromUrlAsArray($url);
    }

    /** Number formatter - 0 decimal */
    public static function n0(float $number): int
    {
        return (int)number_format($number, 0, '.', '');
    }

    /** Number formatter - 1 decimal */
    public static function n1(float $number): float
    {
        return (float)number_format($number, 1, '.', '');
    }

    /** Number formatter - 2 decimals */
    public static function n2(float $number): float
    {
        return (float)number_format($number, 2, '.', '');
    }

    /** Number formatter - 3 decimals */
    public static function n3(float $number): float
    {
        return (float)number_format($number, 3, '.', '');
    }

    /** Number formatter - 4 decimals */
    public static function n4(float $number): float
    {
        return (float)number_format($number, 4, '.', '');
    }

    /**
     * Returns converted one-line markdown; HTML in input is cleaned; output is filtered by allowed tags
     * @deprecated Use Md class instead
     * @param string $string Input
     * @return string Cleaned and converted output string
     */
    public static function makeMdStrict(string $string): string
    {
        return (new Md(Base::instance(), Markdown::instance()))->makeOneLine($string);
    }

    /**
     * Returns converted multi-line markdown; HTML in input is cleaned
     * @deprecated Use Md class instead
     * @param string $string Input
     * @return string Cleaned and converted output string
     */
    public static function makeMdLight(string $string): string
    {
        return (new Md(\Base::instance(), \Markdown::instance()))->makeWithoutHtml($string);
    }

    /**
     * Return converted, multi-line markdown without HTML cleaning
     * @deprecated Use Md class instead
     */
    public static function makeMd(string $string): string
    {
        return (new Md(\Base::instance(), \Markdown::instance()))->makeMd($string);
    }

    /**
     * Converts string to slug (url-safe string)
     * @param float|string $string
     */
    public static function slug($string): string
    {
        return Web::instance()->slug((string)$string);
    }
}
