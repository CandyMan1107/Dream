<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    // Blog(TABLE) INSERT DATAS
    public function insertData() {
        
    }

    // Blog(TABLE) SELECT *
    // user id 매개변수로 받아오기
    public function allData() {
        $blogData = DB::table('blogs')->get();
    }
}
