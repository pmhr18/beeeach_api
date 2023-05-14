<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('prefecture_id')->references('id')->on('prefectures');
            $table->foreign('genre_id')->references('id')->on('genres');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('abv_id')->references('id')->on('abvs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign('items_company_id_foreign');
            $table->dropForeign('items_country_id_foreign');
            $table->dropForeign('items_prefecture_id_foreign');
            $table->dropForeign('items_genre_id_foreign');
            $table->dropForeign('items_color_id_foreign');
            $table->dropForeign('items_abv_id_foreign');
        });
    }
}
