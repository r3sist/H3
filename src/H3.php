<?php
// H3 - Helpers for Fatfree Framework
// Static helpers
// (c) resist | https://github.com/r3sist/h3

class H3
{
    public static function render(string $layout): void
    {
        echo \Template::instance()->render(\V3::clean($layout, 'path').'.html');
    }

    public static function gen(int $length): string
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $key = '';
         for ($p = 0; $p < $length; $p++) {
            $key .= $characters[mt_rand(0, strlen($characters) - 1)];
         }
         return $key;
    }

    /**
     * @deprecated
     */
    public static function clean($string, $pattern = '', $replacement = ''): string
    {
        return \V3::clean($string, $pattern, $replacement);
    }

    /**
     * @param $var
     */
    public static function dump($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }

    /**
     * @param string $string
     * @param int $length
     * @return string
     */
    public static function shorten(string $string, int $length, string $extend = '&hellip;'): string
    {
        $f3 = \Base::instance();
        if (strlen ($string) > 0) {
            if (strlen ($string) > $length) {
                return substr($f3->clean($string), 0, $length).$extend;
            }
            return $f3->clean($string);
        }
        return '';
    }

    public static function keyDown(array $array, $keyNumber): array
    {
        if (count($array)-1 > $keyNumber) {
            $brray = array_slice($array,0,$keyNumber,true);
            $brray[] = $array[$keyNumber+1];
            $brray[] = $array[$keyNumber];
            $brray += array_slice($array,$keyNumber+2,count($array),true);
            return((array)$brray);
        } else {
            return (array)$array;
        }
    }

    public static function keyUp(array $array, $keyNumber): array
    {
        if ($keyNumber > 0 and $keyNumber < count($array)) {
            $brray = array_slice($array,0,($keyNumber-1),true);
            $brray[] = $array[$keyNumber];
            $brray[] = $array[$keyNumber-1];
            $brray += array_slice($array,($keyNumber+1),count($array),true);
            return((array)$brray);
        } else {
            return (array)$array;
        }
    }

    /**
     * @param string $url
     * @return array
     * @throws Exception
     */
    public static function getJson(string $url): array
    {
        if (\Audit::instance()->url($url) != true) {
            throw new \Exception('getJson error - not valid url: '.$url);
        }

        $response = \Web::instance()->request($url);

        if ($response['error']) {
            throw new \Exception('Error: '.$response['error'].' '.$url);
        }

        $data = json_decode($response['body'], true);
        if (is_null($data)) {
            throw new \Exception('Response not valid JSON data');
        }

        return $data;
    }

    /**
     * @param float $number
     * @return int
     */
    public static function n0(float $number): int
    {
        return (int)number_format($number, 0, '.', '');
    }

    /**
     * @param float $number
     * @return float
     */
    public static function n1(float $number): float
    {
        return number_format($number, 1, '.', '');
    }

    /**
     * @param float $number
     * @return float
     */
    public static function n2(float $number): float
    {
        return number_format($number, 2, '.', '');
    }

    /**
     * @param float $number
     * @return float
     */
    public static function n3(float $number): float
    {
        return number_format($number, 3, '.', '');
    }

    /**
     * @param float $number
     * @return float
     */
    public static function n4(float $number): float
    {
        return number_format($number, 4, '.', '');
    }

    /*
     * Returns converted md; HTML in input is cleaned; output is filtered by allowed tags
     */
    /**
     * @param string $string Input
     * @param string $allowedTags // Comma separated list of allowed tags
     * @return string // Cleaned and converted output string
     */
    public static function makeMdStrict(string $string, string $allowedTags = 'i,em,b,strong,a,code'): string
    {
        $f3 = \Base::instance();
        $string = $f3->clean($string, 'br');
        $md = \Markdown::instance()->convert($string);
        $cleaned = $f3->clean($md, $allowedTags);
        return $cleaned;
    }

    /*
     * Returns converted md; HTML in input is cleaned
     */
    /**
     * @param string $string
     * @return string
     */
    public static function makeMdLight(string $string): string
    {
        $f3 = \Base::instance();
        $string = $f3->clean($string, 'br');
        $md = \Markdown::instance()->convert($string);
        return $md;
    }

    /**
     * @param string $string
     * @return string
     */
    public static function makeMd(string $string): string
    {
        $md = \Markdown::instance()->convert($string);
        return $md;
    }


}
