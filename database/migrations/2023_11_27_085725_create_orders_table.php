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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('route_start');
            $table->integer('route_end');
            $table->boolean('direction');
            $table->integer('passenger_id');
            $table->integer('driver_id');
            $table->date('date');
            $table->string('token');
            $table->boolean('status');
            $table->foreign('route_start')->references('id')->on('routes')->onDelete('cascade');
            $table->foreign('route_end')->references('id')->on('routes')->onDelete('cascade');
            $table->foreign('passenger_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('driver_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
