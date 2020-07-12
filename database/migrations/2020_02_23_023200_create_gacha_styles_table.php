<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGachaStylesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      /*
        Schema::create('gacha_styles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('a_word')->nullable();
            $table->text('description')->nullable();
            $table->string('background_image1')->nullable();

            $table->timestamps();
        });
        */
        Schema::table('gacha_styles', function (Blueprint $table) {
           $table->boolean('recommend_flg')->default(false);
         });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::dropIfExists('gacha_styles');
    }
}
