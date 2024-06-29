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
        Schema::create('sales', function (Blueprint $table) {
            $table->id('SalesID');
            $table->date('SalesDate');
            $table->unsignedBigInteger('ProductID');
            $table->decimal('SalesAmount', 10, 2);
            $table->unsignedBigInteger('SalesPersonID');
            $table->timestamps();

            $table->foreign('ProductID')->references('ProductID')->on('products');
            $table->foreign('SalesPersonID')->references('SalesPersonID')->on('salespersons');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
