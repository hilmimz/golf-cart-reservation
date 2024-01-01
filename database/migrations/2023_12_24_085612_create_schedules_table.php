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
            $table->timestamp('time');
            $table->integer('route_start');
            $table->integer('schedule_time_id');
            $table->timestamp('last_updated');
            $table->foreign('route_start')->references('id')->on('routes')->onDelete('cascade');
            $table->foreign('schedule_time_id')->references('id')->on('schedule_time')->onDelete('cascade');
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
