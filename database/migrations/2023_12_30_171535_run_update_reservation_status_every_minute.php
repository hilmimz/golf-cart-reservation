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
        DB::unprepared("
            DECLARE
                job_exists NUMBER;
            BEGIN
                -- Memeriksa apakah job sudah ada
                SELECT COUNT(*)
                INTO job_exists
                FROM user_scheduler_jobs
                WHERE job_name = 'UPDATE_RESERVATION_STATUS_JOB';
        
                IF job_exists = 0 THEN
                    DBMS_SCHEDULER.create_job (
                        job_name        => 'UPDATE_RESERVATION_STATUS_JOB',
                        job_type        => 'PLSQL_BLOCK',
                        job_action      => 'BEGIN update_reservation_status; END;',
                        start_date      => SYSTIMESTAMP,
                        repeat_interval => 'FREQ=MINUTELY; INTERVAL=1',
                        enabled         => TRUE
                    );
                END IF;
            END;
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared("
        BEGIN
            DBMS_SCHEDULER.drop_job('UPDATE_RESERVATION_STATUS_JOB');
        END;
      ");
    }
};
