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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->time('time');
            $table->integer('route_start');
            $table->boolean('direction');
            $table->integer('golf_cart_id');
            $table->foreign('route_start')->references('id')->on('routes')->onDelete('cascade');
            $table->foreign('golf_cart_id')->references('id')->on('golf_carts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
