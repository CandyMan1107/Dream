<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // COMMENTS TABLE
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment_type');
            // [COMMENT TYPE]
            // blog_board, novel_episode
            // blog_boards TABLE, novel_episodes TABLE
            $table->integer('belong_to_id');
            // ID of [COMMENT TYPE]
            // 이건 회원 추가 되면 $table->string('user_id');  // WRITER OF THIS COMMENT
            $table->mediumText('comment');
            $table->integer('comment_like');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('comments');
    }
}
