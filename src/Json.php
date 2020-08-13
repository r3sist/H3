<?php declare(strict_types=1);
/**
 * H3/Json - Json helpers
 * (c) 2020 resist | https://resist.hu | https://github.com/r3sist/h3
 */

namespace resist\H3;

use Audit;
use Web;
use JsonException;
use Exception;

/** Json helpers */
class Json
{
    private Web $web;
    private Audit $audit;

    /**
     * @param Web $web Fatfree Framework: Web
     * @param Audit $audit Fatfree Framework: Audit
     */
    public function __construct(Web $web, Audit $audit)
    {
        $this->web = $web;
        $this->audit = $audit;
    }

    /**
     * API helper
     * @throws JsonException|Exception
     * @return array Empty if null returned from API request
     */
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

        return $data ?? [];
    }
}
