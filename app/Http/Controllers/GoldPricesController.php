<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\GoldPrices;

class GoldPricesController extends Controller
{
    
    //Récupère les prix de gold de la base de données et renvoie la vue.
    public function index()
    {
        
        $goldPrices = GoldPrices::all();
        // formater pour qu'elles soient compatibles avec ApexCharts.
        //  pour extraire les prix et les dates dans des tableaux séparés.
        $dates = $goldPrices->pluck('date')->toArray();
        $prix24k = $goldPrices->pluck('prix_gram_24k')->toArray();
        $prix22k = $goldPrices->pluck('prix_gram_22k')->toArray();
        $prix21k = $goldPrices->pluck('prix_gram_21k')->toArray();
        $prix = $goldPrices->pluck('prix')->toArray();
        return view('goldPrice', compact('goldPrices','dates','prix24k','prix22k','prix21k','prix'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request)
    {
        $response = Http::withOptions(['verify'=>false,])->withHeaders([
            'x-access-token' => env('GOLD_API_KEY'), // la clé API dans le fichier .env
            ])->get('https://www.goldapi.io/api/XAU/USD');

        if ($response->successful()) {
            $data = $response->json();
            // Enregistrez les données dans la base de données
            GoldPrices::create([
                'prix_gram_24k' => $data['price_gram_24k'],
                'prix_gram_22k' => $data['price_gram_22k'],
                'prix_gram_21k' => $data['price_gram_21k'],
                'prix' => $data['price'],
                'devise' => $data['currency'],
                'date' => now(),
            ]);
        
        return to_route('gold-prices.index');
        }
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(GoldPrices $goldPrices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GoldPrices $goldPrices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GoldPrices $goldPrices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GoldPrices $goldPrices)
    {
        //
    }
}
