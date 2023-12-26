<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
        CREATE OR REPLACE FUNCTION seat_left(
            p_route_start NUMBER,
            p_route_end NUMBER,
            p_golf_cart_id NUMBER
        ) RETURN NUMBER
        AS
            v_total_rows NUMBER;
            v_max_seat NUMBER;
        BEGIN
            SELECT max_seat INTO v_max_seat
            FROM golf_carts
            WHERE id = p_golf_cart_id;
            
            SELECT COUNT(*) INTO v_total_rows
            FROM reservations   
            WHERE route_start = p_route_start
              AND route_end = p_route_end
              AND status = 1;
            
            v_total_rows := v_max_seat - v_total_rows;
            RETURN v_total_rows;
        EXCEPTION
            WHEN OTHERS THEN
                -- Handle exceptions if needed
                RETURN NULL;
        END seat_left;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP FUNCTION seat_left');
    }
};
