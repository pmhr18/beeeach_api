<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBreweriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('breweries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name', 100)->nullable(false);
            $table->string('formal_name', 100)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('access', 100)->nullable();
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('prefecture_id')->nullable();
            $table->text('main_image_url')->nullable();
            $table->timestamp('created_at');
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
        Schema::dropIfExists('breweries');
    }
}
