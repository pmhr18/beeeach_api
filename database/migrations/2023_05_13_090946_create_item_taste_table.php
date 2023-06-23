<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTasteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_taste', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('taste_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_taste');
    }
}
