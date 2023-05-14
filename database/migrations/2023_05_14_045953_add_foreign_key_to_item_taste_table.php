<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToItemTasteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_taste', function (Blueprint $table) {
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('taste_id')->references('id')->on('tastes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_taste', function (Blueprint $table) {
            $table->dropForeign('item_taste_item_id_foreign');
            $table->dropForeign('item_taste_taste_id_foreign');
        });
    }
}
