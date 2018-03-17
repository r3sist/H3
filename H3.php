<?php

class H3
{

    public static function render($layout)
    {
        echo \Template::instance()->render($layout.'.html');
    }
    
    public static function gen($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $key = '';
         for ($p = 0; $p < $length; $p++) {
            $key .= $characters[mt_rand(0, strlen($characters))];
         }
         return $key;
    }
    
    public static function clean($string)
    {
        $utf8 = array(
            '/[áàâãªä]/u'   =>   'a',
            '/[ÁÀÂÃÄ]/u'    =>   'A',
            '/[ÍÌÎÏ]/u'     =>   'I',
            '/[íìîï]/u'     =>   'i',
            '/[éèêë]/u'     =>   'e',
            '/[ÉÈÊË]/u'     =>   'E',
            '/[óòôõºö]/u'   =>   'o',
            '/[ÓÒÔÕÖ]/u'    =>   'O',
            '/[úùûü]/u'     =>   'u',
            '/[ÚÙÛÜ]/u'     =>   'U',
            '/ç/'           =>   'c',
            '/Ç/'           =>   'C',
            '/ñ/'           =>   'n',
            '/Ñ/'           =>   'N',
            '/–/'           =>   '-', // UTF-8 hyphen to "normal" hyphen
            '/[’‘‹›‚]/u'    =>   '',  // Literally a single quote
            '/[“”«»„]/u'    =>   '',  // Double quote
            '/ /'           =>   ' ', // nonbreaking space (equiv. to 0x160)
        );
        $string = preg_replace(array_keys($utf8), array_values($utf8), $string);
//        $string = preg_replace("/[^A-Za-z0-9 -]/", "_", $string);
        $string = preg_replace("/[^A-Za-z0-9]/", "", $string);
        return $string;
    }

    public static function dump($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }
}
