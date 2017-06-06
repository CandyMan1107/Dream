<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      // 소설 정보에 대한 테이블
      Schema::create('novels', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->string('intro');
          $table->string('cover_img_src');
          $table->string('publish_case');
          $table->string('period')->nullable();
          $table->string('genre');
          $table->timestamps();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('novels');
    }
}
