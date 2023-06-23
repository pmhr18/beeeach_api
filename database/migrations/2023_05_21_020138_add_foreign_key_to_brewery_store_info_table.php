<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToBreweryStoreInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brewery_store_info', function (Blueprint $table) {
            $table->foreign('brewery_id')->references('id')->on('breweries');
            $table->foreign('store_info_id')->references('id')->on('store_info');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('brewery_store_info', function (Blueprint $table) {
            $table->dropForeign('brewery_store_info_brewery_id_foreign');
            $table->dropForeign('brewery_store_info_store_info_id_foreign');
        });
    }
}
