<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDistanceAndDurationToEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('driving_distance')->after('venue');
            $table->string('driving_duration')->after('driving_distance');
            $table->string('walking_distance')->after('driving_duration');
            $table->string('walking_duration')->after('walking_distance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn('walking_duration');
            $table->dropColumn('walking_distance');
            $table->dropColumn('driving_duration');
            $table->dropColumn('driving_distance');
        });
    }
}
