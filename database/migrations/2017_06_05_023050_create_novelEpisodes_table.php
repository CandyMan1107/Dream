<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovelEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 회차에 대한 테이블
        Schema::create('novel_episodes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("belong_to_novel");
            $table->boolean('is_charge'); // 유무료
            $table->boolean('is_notice'); // 공지 참/거짓, 참 = 공지
            $table->string('cover_img_src');
            $table->string('episode_title');
            $table->string('episode');
            $table->string('writers_postscript'); // 작가의 한마디
            $table->integer('char_count')->default('0'); // 글자수 : 작가가 글쓴 시점에서 한번만 계산하기 위함
            $table->timestamps();

        });

        // Schema::table('novel_episodes', function (Blueprint $table) {
        //     $table->foreign("belong_to_novel")->references('id')->on('novel_chapters');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('novel_episodes');
    }
}
