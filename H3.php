<?php

class H3
{

    public static function render(string $layout): void
    {
        echo \Template::instance()->render($layout.'.html');
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
    
    public static function clean(string $string, string $validation = 'strict'): string
    {
        return \V3::clean($string, $validation);
    }

    public static function dump($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }

    public static function shorten(string $string, int $length): string
    {
        $f3 = \Base::instance();
        if (strlen ($string) > 0) {
            if (strlen ($string) > $length) {
                return substr($f3->clean($string), 0, $length).'&hellip;';
            }
            return $f3->clean($string);
        }
        return '';
    }

    public static function keyDown($a, $x) {
        if (count($a)-1 > $x) {
            $b = array_slice($a,0,$x,true);
            $b[] = $a[$x+1];
            $b[] = $a[$x];
            $b += array_slice($a,$x+2,count($a),true);
            return($b);
        } else {
            return $a;
        }
    }

    public static function keyUp($a, $x) {
        if ($x > 0 and $x < count($a)) {
            $b = array_slice($a,0,($x-1),true);
            $b[] = $a[$x];
            $b[] = $a[$x-1];
            $b += array_slice($a,($x+1),count($a),true);
            return($b);
        } else {
            return $a;
        }
    }
    
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

    public static function n0(float $number): float
    {
        return number_format($number, 0, '.', '');
    }

    public static function n1(float $number): float
    {
        return number_format($number, 1, '.', '');
    }

    public static function n2(float $number): float
    {
        return number_format($number, 2, '.', '');
    }

    public static function n3(float $number): float
    {
        return number_format($number, 3, '.', '');
    }

    public static function n4(float $number): float
    {
        return number_format($number, 4, '.', '');
    }

    /*
     * Returns converted md; HTML in input is cleaned; output is filtered by allowed tags
     */
    public static function makeMdStrict(float $string, $allowedTags = 'i,em,b,strong,a,code'): string
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
    public static function makeMdLight(float $string): string
    {
        $f3 = \Base::instance();
        $string = $f3->clean($string, 'br');
        $md = \Markdown::instance()->convert($string);
        return $md;
    }

    public static function makeMd(float $string): string
    {
        $md = \Markdown::instance()->convert($string);
        return $md;
    }
}
