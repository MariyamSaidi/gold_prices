<?php

use Illuminate\Foundation\Console\ClosureCommand;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\GoldPrices;
Artisan::command('inspire', function () {
    /** @var ClosureCommand $this */
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

//Schedule::call(function () {
 //   schedule->command('fetch:gold-prices');
//})->everyMinute();





Artisan::command('fetch:gold-prices', function () {
    $this->info('Fetching gold prices...');

    $response = Http::withOptions(['verify' => false])->withHeaders([
        'x-access-token' => env('GOLD_API_KEY'),
    ])->get('https://www.goldapi.io/api/XAU/USD');

    if ($response->successful()) {
        $data = $response->json();

        GoldPrices::create([
            'prix_gram_24k' => $data['price_gram_24k'],
            'prix_gram_22k' => $data['price_gram_22k'],
            'prix_gram_21k' => $data['price_gram_21k'],
            'devise' => $data['currency'],
            'date' => now(),
        ]);

        Log::info('Gold price updated successfully.');
        $this->info('Gold price updated successfully.');
    } else {
        Log::error('Failed to fetch gold price. Response: ' . $response->body());
        $this->error('Failed to fetch gold price. Response: ' . $response->body());
    }
})->describe('Fetch and update gold prices');


// Schedule the command
Schedule::command('fetch:gold-prices')->everyMinute();