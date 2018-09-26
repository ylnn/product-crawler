<?php

use Illuminate\Database\Seeder;
use App\Source;

class SourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Source::create([
            'url' => 'https://www.ofracosmetics.com/products.json',
        ]);
        Source::create([
            'url' => 'https://www.lonb.com/products.json',
        ]);
        Source::create([
            'url' => 'https://www.pringlescotland.com/products.json',
        ]);
    }
}
