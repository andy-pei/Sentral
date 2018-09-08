<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddHasPermissionToParticipantables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('participantables', function (Blueprint $table) {
            $table->tinyInteger('has_permission')->after('event_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('participantables', function (Blueprint $table) {
            $table->dropColumn('has_permission');
        });
    }
}
