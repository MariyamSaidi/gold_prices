<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoldPrices extends Model
{
    use HasFactory;
    protected $fillable =['prix_gram_24k','prix_gram_22k','prix_gram_21k','prix','devise','date'];
    public function History_Price() { return $this->hasMany(History_Price::class, 'id_gold_prices'); }

}
