<?php
// H3 - Helpers for Fatfree Framework
// Json helpers
// (c) resist | https://github.com/r3sist/h3

namespace resist\H3;

use Audit;
use Web;
use Exception;

class Json
{
    private Web $web;

    public function __construct(Web $web, Audit $audit)
    {
        $this->web = $web;
        $this->audit = $audit;
    }

    public function getJsonFromUrlAsArray(string $url): array
    {
        if (!$this->audit->url($url)) {
            throw new Exception('Not valid url: '.$url);
        }

        $response = $this->web->request($url);

        if ($response['error']) {
            throw new Exception('Url error: '.$response['error'].' '.$url);
        }

        $data = json_decode($response['body'], true, 512, JSON_THROW_ON_ERROR);

        if ($data === null) {
            return [];
        }

        return $data;
    }
}
