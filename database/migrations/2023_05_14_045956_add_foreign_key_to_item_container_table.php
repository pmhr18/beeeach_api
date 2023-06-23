<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToItemContainerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_container', function (Blueprint $table) {
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('container_id')->references('id')->on('containers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_container', function (Blueprint $table) {
            $table->dropForeign('item_container_item_id_foreign');
            $table->dropForeign('item_container_container_id_foreign');
        });
    }
}
