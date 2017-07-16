<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // RECOMMENTS TABLE
        Schema::create('recomments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comment_id');  // COMMENT ID : comments table 'id'
            // 이건 회원 추가 되면 $table->string('user_id');   // WRITER OF THIS RECOMMENT
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
        //
        Schema::dropIfExists('recomments');
    }
}
