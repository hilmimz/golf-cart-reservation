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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->integer('route_start');
            $table->integer('route_end');
            $table->integer('passenger_id');
            $table->integer('driver_id')->nullable();
            $table->date('date');
            $table->string('token');
            $table->boolean('status');
            $table->integer('golf_cart_id');
            $table->foreign('route_start')->references('id')->on('schedules')->onDelete('cascade');
            $table->foreign('route_end')->references('id')->on('schedules')->onDelete('cascade');
            $table->foreign('passenger_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('driver_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('golf_cart_id')->references('id')->on('golf_carts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
