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
    
    public static function clean($string, $validation = 'strict')
    {
        $utf8 = array(
            '/[áàâãªä]/u'   =>   'a',
            '/[ÁÀÂÃÄ]/u'    =>   'A',
            '/[ÍÌÎÏ]/u'     =>   'I',
            '/[íìîï]/u'     =>   'i',
            '/[éèêë]/u'     =>   'e',
            '/[ÉÈÊË]/u'     =>   'E',
            '/[óòôõºöő]/u'   =>   'o',
            '/[ÓÒÔÕÖ]/u'    =>   'O',
            '/[úùûüű]/u'     =>   'u',
            '/[ÚÙÛÜŰ]/u'     =>   'U',
            '/ç/'           =>   'c',
            '/Ç/'           =>   'C',
            '/ñ/'           =>   'n',
            '/Ñ/'           =>   'N',
            '/–/'           =>   '-', // UTF-8 hyphen to "normal" hyphen
            '/[’‘`‹›‚]/u'    =>   '',  // Literally a single quote
            '/[“”«»„]/u'    =>   '',  // Double quote
            '/ /'           =>   ' ', // nonbreaking space (equiv. to 0x160)
            '/\$/'           =>   ''
        );
        $dangerous = array(
            'exec','passthru','system','shell_exec','`','popen','proc_open','pcntl_exec','new ',
            'eval','assert','preg_replace','call_user_function_array','preg_match','create_function','include',
            'include_once','require','require_once','_GET','_REQUEST','_POST','_COOKIE','_SESSION','mysql','ob_start',
            'array_diff_uassoc','array_diff_ukey','array_filter','array_intersect_uassoc','array_intersect_ukey',
            'array_map','array_reduce','array_udiff_assoc','array_udiff_uassoc',
            'array_udiff','array_uintersect_assoc','array_uintersect_uassoc','array_uintersect','array_walk_recursive','array_walk',
            'assert_options','uasort','uksort','usort','preg_replace_callback','spl_autoload_register','iterator_apply',
            'call_user_func','call_user_func_array','register_shutdown_function','register_tick_function','set_error_handler',
            'set_exception_handler','session_set_save_handler','sqlite_create_aggregate','sqlite_create_function',
            'phpinfo','posix_mkfifo','posix_getlogin','posix_ttyname','getenv','get_current_user','proc_get_status',
            'get_cfg_var','disk_free_space','disk_total_space','diskfreespace','getcwd','getlastmo','getmygid',
            'getmyinode','getmypid','getmyuid','extract','parse_str','putenv','ini_set','mail','header','proc_nice','proc_terminate',
            'proc_close','pfsockopen','fsockopen','apache_child_terminate','posix_kill','posix_mkfifo','posix_setpgid',
            'posix_setsid','posix_setuid','fopen','tmpfile','bzopen','gzopen','SplFileObject','chgrp','chmod','chown',
            'copy','file_put_contents','lchgrp','lchown','link','mkdir','move_uploaded_file','rename','rmdir','symlink',
            'tempnam','touch','unlink','imagepng','imagewbmp','image2wbmp','imagejpeg','imagexbm','imagegif','imagegd',
            'imagegd2','iptcembed','ftp_get','ftp_nb_get','file_exists','file_get_contents','file','fileatime','filectime',
            'filegroup','fileinode','filemtime','fileowner','fileperms','filesize','filetype','glob','is_dir','is_executable',
            'is_file','is_link','is_readable','is_uploaded_file','is_writable','is_writeable','linkinfo','lstat',
            'parse_ini_file','pathinfo','readfile','readlink','realpath','stat','gzfile','readgzfile',
            'getimagesize','imagecreatefromgif','imagecreatefromjpeg','imagecreatefrompng','imagecreatefromwbmp','imagecreatefromxbm',
            'imagecreatefromxpm','ftp_put','ftp_nb_put','exif_read_data','read_exif_data','exif_thumbnail','exif_imagetype',
            'hash_file','hash_hmac_file','hash_update_file','md5_file','sha1_file','highlight_file','show_source',
            'php_strip_whitespace','get_meta_tags','die'
        );
        $string = preg_replace(array_keys($utf8), array_values($utf8), $string);
        if ($validation == 'strict') {            
            $string = preg_replace("/[^A-Za-z0-9]/", "", $string);
        } elseif ($validation == 'light') {            
            $string = preg_replace("/[^A-Za-z0-9 -_]/", " ", $string);
        } elseif ($validation == 'dangerous') {
            $string = str_replace($dangerous, '', $string);
        }
        return $string;
    }

    public static function dump($var)
    {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
    }

    public static function shorten($string, $length)
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
}
