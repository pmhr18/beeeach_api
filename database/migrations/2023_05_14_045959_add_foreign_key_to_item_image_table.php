<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToItemImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_image', function (Blueprint $table) {
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('image_id')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_image', function (Blueprint $table) {
            $table->dropForeign('item_image_item_id_foreign');
            $table->dropForeign('item_image_image_id_foreign');
        });
    }
}
