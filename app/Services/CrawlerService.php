<?php

namespace App\Services;

class CrawlerService
{
    public function crawl($url) : object
    {
        $client = new \GuzzleHttp\Client();

        $res = $client->request('GET', $url);

        $body = $res->getBody();

        return json_decode($body);
    }
}
