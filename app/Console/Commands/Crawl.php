<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CrawlerService;

class Crawl extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start crawling.';


    protected $crawlerService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CrawlerService $crawlerService)
    {
        parent::__construct();

        $this->crawlerService = $crawlerService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Crawler started...');

        $start = microtime(true);

        $crawlerResult = $this->crawlerService->start();

        $time = microtime(true) - $start;

        if(!$crawlerResult) {
            $this->error('Crawler error.');
        }

        $this->info('Crawling finished.');
        $this->info('Time: '. $time);
    }
}
