<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http; // Ensure this line is included
use App\Models\GoldPrices;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\Log;
class FetchGoldPrices extends Command
{
    protected function schedule(Schedule $schedule)
    {   
       $schedule->command('fetch:gold-prices')->everyMinute();
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:gold-prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::withOptions(['verify' => false])->withHeaders([
            'x-access-token' => env('GOLD_API_KEY'),
        ])->get('https://www.goldapi.io/api/XAU/USD');

        if ($response->successful()) {
            $data = $response->json();

            GoldPrices::create([
                'prix_gram_24k' => $data['price_gram_24k'],
                'prix_gram_22k' => $data['price_gram_22k'],
                'prix_gram_21k' => $data['price_gram_21k'],
                'prix' => $data['price'],
                'devise' => $data['currency'],
                'date' => now(),
            ]);

            Log::info('Gold price updated successfully.');
        } else {
            Log::error('Failed to fetch gold price.');
        }
    }
    
}
