<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History_Price extends Model
{
    use HasFactory;
    protected $table = 'history_prices';
    protected $fillable =['id_gold_prices','date_enregistrement'];
    public function GoldPrices() { return $this->belongsTo(GoldPrice::class, 'id_gold_prices'); }
}

