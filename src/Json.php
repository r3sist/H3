<?php
// H3 - Helpers for Fatfree Framework
// Json helpers
// (c) resist | https://github.com/r3sist/h3

namespace resist\H3;

use \Web;
use \Exception;

class Json
{
    private Web $web;

    public function __construct(Web $web)
    {
        $this->web = $web;
    }

    public function getJsonAsArray(string $url): array
    {
//        if (filter_var($url, FILTER_VALIDATE_URL) !== true) {
//            throw new Exception('getJson error - not valid url: '.$url);
//        }

        $response = $this->web->request($url);

        if ($response['error']) {
            throw new Exception('getJson error: '.$response['error'].' '.$url);
        }

        $data = json_decode($response['body'], true);
        if (is_null($data)) {
            return [];
        }

        return $data;
    }
}
