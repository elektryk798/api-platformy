<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBitcoinTrades extends Migration
{
    public function up(): void
    {
        Schema::create('bitcoin_trades', function (Blueprint $table) {
            $table->id();
            $table->string('date');
            $table->decimal('price');
            $table->string('type');
            $table->decimal('amount',12,8);
            $table->string('tid');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bitcoin_trades');
    }
}
