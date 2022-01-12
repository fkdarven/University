<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class StoredProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('CREATE PROCEDURE `total_citizens_sum`(INOUT state_id2 INT)
        BEGIN
            IF ((SELECT count(*) FROM cities WHERE state_id = state_id2) = 0) THEN
            UPDATE states SET total_citizens = 0 WHERE id = state_id2;
            ELSE
            UPDATE states SET total_citizens = (SELECT sum(citizens) FROM cities WHERE state_id = state_id2)
            WHERE id = state_id2;
            END IF;
        END');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS total_citizens_sum');
    }
}
