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
            CREATE OR REPLACE PROCEDURE update_reservation_status AS
            BEGIN
            -- Jika waktu sekarang sudah lebih dari 5 menit dari waktu keberangkatan maka status menjadi 0
            UPDATE reservations r
            SET r.status = 0
            WHERE EXISTS (
                SELECT 1
                FROM schedules s
                WHERE s.id = r.route_start
                AND (EXTRACT(HOUR FROM (SYSTIMESTAMP - s.time))+7) * 60 +
                    EXTRACT(MINUTE FROM (SYSTIMESTAMP - s.time)) > 5
            );
            END update_reservation_status;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE update_reservation_status');
    }
};
