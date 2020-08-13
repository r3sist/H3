<?php
// H3 - Helpers for Fatfree Framework
// Simple atom feed parser
// (c) resist | https://github.com/r3sist/h3

namespace resist\H3;

use \Web;

class Atom
{
    private Web $web;

    public function __construct(Web $web)
    {
        $this->web = $web;
    }

    // This method was forked from Fatfree Framework's \Web\rss() method
    public function getFeedAsArray(string $url): array {
        // URL filter is not UTF-8 ready
        if (filter_var($url, FILTER_VALIDATE_URL) !== false && $data = $this->web->request($url)) {
            libxml_use_internal_errors(true);
            $xml = simplexml_load_string($data['body'], 'SimpleXMLElement',LIBXML_NOBLANKS|LIBXML_NOERROR|LIBXML_NOCDATA);

            return json_decode(json_encode((array)$xml, JSON_THROW_ON_ERROR), true, 512, JSON_THROW_ON_ERROR);
        }
        return [];
    }
}
