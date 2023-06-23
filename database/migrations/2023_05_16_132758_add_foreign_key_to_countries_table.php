<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->foreign('area_id')->references('id')->on('areas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('countries', function (Blueprint $table) {
            $table->dropForeign('countries_area_id_foreign');
        });
    }
}
