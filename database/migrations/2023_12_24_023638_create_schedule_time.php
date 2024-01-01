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
        Schema::create('schedule_time', function (Blueprint $table) {
            $table->id();
            $table->timestamp('start');
            $table->timestamp('end');
            $table->integer('golf_cart_id');
            $table->timestamp('last_updated');
            $table->foreign('golf_cart_id')->references('id')->on('golf_carts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedule_time');
    }
};
