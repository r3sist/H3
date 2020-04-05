<?php
// H3 - Validator - Simple true/false validator
// (c) resist | https://github.com/r3sist/h3

namespace resist\H3;

class Validator
{
    /** May be empty string or contain: a-zA-Z0-9 space , ; . */
    public function isAlphanumericList($value): bool
    {
        if ($value === true || is_object($value)) {
            return false;
        }
        return $value === '' || (bool)preg_match("/^([a-zA-Z0-9 ,;.])+$/i", $value);
    }

    /** May be empty string or contain: a-zA-Z0-9 space .,;<>+()=%^*-/ */
    public function isMath($mathExpression): bool
    {
        if ($mathExpression === true || is_object($mathExpression)) {
            return false;
        }
        return $mathExpression === '' || (bool)preg_match("/^([a-zA-Z0-9 .,;<>+()=%^\-*\/])+$/i", $mathExpression);
    }

    public function isJson(string $json): bool
    {
        json_decode($json);
        return (json_last_error() === JSON_ERROR_NONE);
    }

    public function isIMDbId(string $id): bool
    {
        if (strpos($id, 'tt') === 0) {
            $remained = explode('tt', $id);
            if (count($remained) === 2 && is_numeric($remained[1])) {
                return true;
            }
        }
        return false;
    }

    public function isSlug(string $slug): bool
    {
        return $this->filterSlug($slug) === $slug;
    }

    /** Copyright Fatfree Framework: Web() */
    public function filterSlug(string $string): string
    {
        $diacritics = [
            'Ǎ'=>'A','А'=>'A','Ā'=>'A','Ă'=>'A','Ą'=>'A','Å'=>'A',
            'Ǻ'=>'A','Ä'=>'Ae','Á'=>'A','À'=>'A','Ã'=>'A','Â'=>'A',
            'Æ'=>'AE','Ǽ'=>'AE','Б'=>'B','Ç'=>'C','Ć'=>'C','Ĉ'=>'C',
            'Č'=>'C','Ċ'=>'C','Ц'=>'C','Ч'=>'Ch','Ð'=>'Dj','Đ'=>'Dj',
            'Ď'=>'Dj','Д'=>'Dj','É'=>'E','Ę'=>'E','Ё'=>'E','Ė'=>'E',
            'Ê'=>'E','Ě'=>'E','Ē'=>'E','È'=>'E','Е'=>'E','Э'=>'E',
            'Ë'=>'E','Ĕ'=>'E','Ф'=>'F','Г'=>'G','Ģ'=>'G','Ġ'=>'G',
            'Ĝ'=>'G','Ğ'=>'G','Х'=>'H','Ĥ'=>'H','Ħ'=>'H','Ï'=>'I',
            'Ĭ'=>'I','İ'=>'I','Į'=>'I','Ī'=>'I','Í'=>'I','Ì'=>'I',
            'И'=>'I','Ǐ'=>'I','Ĩ'=>'I','Î'=>'I','Ĳ'=>'IJ','Ĵ'=>'J',
            'Й'=>'J','Я'=>'Ja','Ю'=>'Ju','К'=>'K','Ķ'=>'K','Ĺ'=>'L',
            'Л'=>'L','Ł'=>'L','Ŀ'=>'L','Ļ'=>'L','Ľ'=>'L','М'=>'M',
            'Н'=>'N','Ń'=>'N','Ñ'=>'N','Ņ'=>'N','Ň'=>'N','Ō'=>'O',
            'О'=>'O','Ǿ'=>'O','Ǒ'=>'O','Ơ'=>'O','Ŏ'=>'O','Ő'=>'O',
            'Ø'=>'O','Ö'=>'O','Õ'=>'O','Ó'=>'O','Ò'=>'O','Ô'=>'O',
            'Œ'=>'OE','П'=>'P','Ŗ'=>'R','Р'=>'R','Ř'=>'R','Ŕ'=>'R',
            'Ŝ'=>'S','Ş'=>'S','Š'=>'S','Ș'=>'S','Ś'=>'S','С'=>'S',
            'Ш'=>'Sh','Щ'=>'Shch','Ť'=>'T','Ŧ'=>'T','Ţ'=>'T','Ț'=>'T',
            'Т'=>'T','Ů'=>'U','Ű'=>'U','Ŭ'=>'U','Ũ'=>'U','Ų'=>'U',
            'Ū'=>'U','Ǜ'=>'U','Ǚ'=>'U','Ù'=>'U','Ú'=>'U','Ü'=>'U',
            'Ǘ'=>'U','Ǖ'=>'U','У'=>'U','Ư'=>'U','Ǔ'=>'U','Û'=>'U',
            'В'=>'V','Ŵ'=>'W','Ы'=>'Y','Ŷ'=>'Y','Ý'=>'Y','Ÿ'=>'Y',
            'Ź'=>'Z','З'=>'Z','Ż'=>'Z','Ž'=>'Z','Ж'=>'Zh','á'=>'a',
            'ă'=>'a','â'=>'a','à'=>'a','ā'=>'a','ǻ'=>'a','å'=>'a',
            'ä'=>'ae','ą'=>'a','ǎ'=>'a','ã'=>'a','а'=>'a','ª'=>'a',
            'æ'=>'ae','ǽ'=>'ae','б'=>'b','č'=>'c','ç'=>'c','ц'=>'c',
            'ċ'=>'c','ĉ'=>'c','ć'=>'c','ч'=>'ch','ð'=>'dj','ď'=>'dj',
            'д'=>'dj','đ'=>'dj','э'=>'e','é'=>'e','ё'=>'e','ë'=>'e',
            'ê'=>'e','е'=>'e','ĕ'=>'e','è'=>'e','ę'=>'e','ě'=>'e',
            'ė'=>'e','ē'=>'e','ƒ'=>'f','ф'=>'f','ġ'=>'g','ĝ'=>'g',
            'ğ'=>'g','г'=>'g','ģ'=>'g','х'=>'h','ĥ'=>'h','ħ'=>'h',
            'ǐ'=>'i','ĭ'=>'i','и'=>'i','ī'=>'i','ĩ'=>'i','į'=>'i',
            'ı'=>'i','ì'=>'i','î'=>'i','í'=>'i','ï'=>'i','ĳ'=>'ij',
            'ĵ'=>'j','й'=>'j','я'=>'ja','ю'=>'ju','ķ'=>'k','к'=>'k',
            'ľ'=>'l','ł'=>'l','ŀ'=>'l','ĺ'=>'l','ļ'=>'l','л'=>'l',
            'м'=>'m','ņ'=>'n','ñ'=>'n','ń'=>'n','н'=>'n','ň'=>'n',
            'ŉ'=>'n','ó'=>'o','ò'=>'o','ǒ'=>'o','ő'=>'o','о'=>'o',
            'ō'=>'o','º'=>'o','ơ'=>'o','ŏ'=>'o','ô'=>'o','ö'=>'o',
            'õ'=>'o','ø'=>'o','ǿ'=>'o','œ'=>'oe','п'=>'p','р'=>'r',
            'ř'=>'r','ŕ'=>'r','ŗ'=>'r','ſ'=>'s','ŝ'=>'s','ș'=>'s',
            'š'=>'s','ś'=>'s','с'=>'s','ş'=>'s','ш'=>'sh','щ'=>'shch',
            'ß'=>'ss','ţ'=>'t','т'=>'t','ŧ'=>'t','ť'=>'t','ț'=>'t',
            'у'=>'u','ǘ'=>'u','ŭ'=>'u','û'=>'u','ú'=>'u','ų'=>'u',
            'ù'=>'u','ű'=>'u','ů'=>'u','ư'=>'u','ū'=>'u','ǚ'=>'u',
            'ǜ'=>'u','ǔ'=>'u','ǖ'=>'u','ũ'=>'u','ü'=>'u','в'=>'v',
            'ŵ'=>'w','ы'=>'y','ÿ'=>'y','ý'=>'y','ŷ'=>'y','ź'=>'z',
            'ž'=>'z','з'=>'z','ż'=>'z','ж'=>'zh','ь'=>'','ъ'=>'',
            'њ'=>'nj','љ'=>'lj','ђ'=>'dj','џ'=>'dz','ћ'=>'c','ј'=>'j',
            '\''=>'',
        ];
        return strtolower(trim(preg_replace('/([^\pL\pN])+/u', '-', trim(strtr($string, $diacritics))), '-'));
    }

    public function isUrl200(string $url): bool
    {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return false;
        }

        $header = get_headers($url, 1);

        if (is_array($header) !== true) {
            return false;
        }

        if (in_array($header[0], ['HTTP/1.1 302 Found', 'HTTP/1.1 302 Moved Temporarily', 'HTTP/1.1 301 Moved Permanently'])) {
            $header = get_headers($header['Location'], 0);

            if (is_array($header) !== true) {
                return false;
            }
        }

        return $header[0] === 'HTTP/1.1 200 OK';
    }
}