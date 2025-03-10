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
        Schema::create('gold_prices', function (Blueprint $table) {
            $table->id();
            $table->DECIMAL('prix');
            $table->string('devise');
            $table->timestamp('date')->useCurrent();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     * price
     * currency 
     * date
     */
    public function down(): void
    {
        Schema::dropIfExists('gold_prices');
    }
};
