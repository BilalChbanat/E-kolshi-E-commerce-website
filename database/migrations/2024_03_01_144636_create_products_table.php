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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->float('price');
            $table->integer('quantityInStock');
            $table->integer('QuantityAvailable');
            $table->string('ref');

            $table->unsignedBigInteger('seller');
            $table->unsignedBigInteger('category_id');

            $table->foreign('seller')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();

            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
