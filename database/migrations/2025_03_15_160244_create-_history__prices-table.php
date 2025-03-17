<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('History_Prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_gold_prices')->unsigned();
            $table->foreign('id_gold_prices')->references('id')->on('gold_prices')->onDelete('cascade');
            $table->timestamp('date_enregistrement')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('History_Prices');
    }
};
