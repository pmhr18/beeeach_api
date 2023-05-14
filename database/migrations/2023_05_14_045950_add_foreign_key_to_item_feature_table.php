<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToItemFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('item_feature', function (Blueprint $table) {
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('feature_id')->references('id')->on('features');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('item_feature', function (Blueprint $table) {
            $table->dropForeign('item_feature_item_id_foreign');
            $table->dropForeign('item_feature_feature_id_foreign');
        });
    }
}
