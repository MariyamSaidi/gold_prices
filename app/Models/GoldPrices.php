<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoldPrices extends Model
{
    use HasFactory;
    protected $fillable =['prix','devise','date'];

}
