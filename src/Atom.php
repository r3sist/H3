<?php declare(strict_types=1);
/**
 * H3/Atom - Simple atom feed parser
 * (c) 2020 resist | https://resist.hu | https://github.com/r3sist/h3
 */

namespace resist\H3;

use Web;
use JsonException;

/** H3/Atom - Simple atom feed parser */
class Atom
{
    private Web $web;

    /** @param Web $web Fatfree Framework: Web */
    public function __construct(Web $web)
    {
        $this->web = $web;
    }

    /**
     * Returns feed as array
     * Forked from Fatfree Framework's \Web\rss() method
     * @throws JsonException
     */
    public function getFeedAsArray(string $url): array
    {
        // URL filter is not UTF-8 ready; Also not validating protocol and vulnerable to JS injections and arbitrary files loading
        if (filter_var($url, FILTER_VALIDATE_URL) !== false && $data = $this->web->request($url)) {
            libxml_use_internal_errors(true);
            $xml = simplexml_load_string($data['body'], 'SimpleXMLElement',LIBXML_NOBLANKS|LIBXML_NOERROR|LIBXML_NOCDATA);

            return json_decode(json_encode((array)$xml, JSON_THROW_ON_ERROR), true, 512, JSON_THROW_ON_ERROR);
        }

        return [];
    }
}
