<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // BLOG BOARDS TABLE
        Schema::create('blog_boards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blog_menu_id');    // BLOG MENU ID : blog_menus table 'id'
            $table->string('board_title');  // BOARD TITLE
            $table->boolean('is_notice'); // TRUE : NOTICE
            // 이건 회원 추가 되면 $table->string('user_id');   // BOARD WRITER
            $table->integer('board_hit')->nullable();   // HIT NUMBER
            $table->integer('board_like')->nullable();    // LIKE NUMBER
            $table->mediumText('board_context'); // BOARD CONTEXT
            $table->timestamps();   // TIMESTAMP OF WRITING THIS BOARD
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('blog_boards');
    }
}
