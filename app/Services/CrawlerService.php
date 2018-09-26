<?php

namespace App\Services;

use App\Source;
use App\Services\ProductService;
use Illuminate\Support\Facades\Log;

class CrawlerService
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    public function start()
    {
        $urls = Source::all();

        if ($urls->count() === 0) {
            $message = "No url found.";
            Log::error($message);
            return $message;
        }

        $urls->each(function ($item) {
            $jsonData = $this->crawl($item->url);
            $this->productService->saveProducts($jsonData->products);
        });

        return true;
    }

    public function crawl($url) : object
    {
        $client = new \GuzzleHttp\Client();

        $res = $client->request('GET', $url);

        $body = $res->getBody();

        return json_decode($body);
    }
}
