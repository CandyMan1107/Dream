<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationsTable extends Migration
{

    public function up()
    {
      Schema::create("relations", function (Blueprint $table){
        $table->increments('rel_id');
        $table->string('from_cha_id');
        $table->string('to_cha_id');
        $table->string('rel_info');
      });
    }


    public function down()
    {
        Schema::dropIfExists("relations");
    }
}
