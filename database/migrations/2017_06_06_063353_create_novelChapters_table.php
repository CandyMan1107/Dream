<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovelChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      // 소설 챕터에 대한 테이블
      Schema::create('novel_chapters', function (Blueprint $table) {
          $table->increments('id');
          $table->integer("belong_to_novel");
          $table->string('title');
          $table->string('intro');
          $table->timestamps();

      });

      // Schema::table('novel_chapters', function (Blueprint $table) {
      //     $table->foreign("belong_to_novel")->references('id')->on('novels');
      // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('novel_chapters');
    }
}
