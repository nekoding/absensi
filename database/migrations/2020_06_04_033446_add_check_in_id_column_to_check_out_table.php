<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCheckInIdColumnToCheckOutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('check_out', function (Blueprint $table) {
            $table->unsignedBigInteger('check_in_id')->after('user_id')->nullable();
            
            $table->foreign('check_in_id')->references('id')->on('check_in');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('check_out', function (Blueprint $table) {
            $table->dropForeign('check_out_check_in_id_foreign');
            $table->dropColumn('check_in_id');
        });
    }
}
