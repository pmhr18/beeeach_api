<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToPrefecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('prefectures', function (Blueprint $table) {
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('region_id')->references('id')->on('regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('prefectures', function (Blueprint $table) {
            $table->dropForeign('prefectures_country_id_foreign');
            $table->dropForeign('prefectures_region_id_foreign');
        });
    }
}
