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
        CREATE OR REPLACE TRIGGER last_updated_golf_carts
        BEFORE INSERT OR UPDATE ON golf_carts
        FOR EACH ROW
        BEGIN
        :NEW.last_updated := SYSTIMESTAMP;
        END;
        ');

        DB::unprepared('
        CREATE OR REPLACE TRIGGER last_updated_routes
        BEFORE INSERT OR UPDATE ON routes
        FOR EACH ROW
        BEGIN
        :NEW.last_updated := SYSTIMESTAMP;
        END;
        ');

        DB::unprepared('
        CREATE OR REPLACE TRIGGER last_updated_schedule_time
        BEFORE INSERT OR UPDATE ON schedule_time
        FOR EACH ROW
        BEGIN
        :NEW.last_updated := SYSTIMESTAMP;
        END;
        ');

        DB::unprepared('
        CREATE OR REPLACE TRIGGER last_updated_schedules
        BEFORE INSERT OR UPDATE ON schedules
        FOR EACH ROW
        BEGIN
        :NEW.last_updated := SYSTIMESTAMP;
        END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER last_updated_golf_carts');
        DB::unprepared('DROP TRIGGER last_updated_routes');
        DB::unprepared('DROP TRIGGER last_updated_schedule_time');
        DB::unprepared('DROP TRIGGER last_updated_schedules');
    }
};
