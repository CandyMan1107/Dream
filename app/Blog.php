<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    // blogs(TABLE) INSERT DATAS
    public function insertBlogD($data) {
        $dataSet = [];
        $dataSet = [
            '' => $data[''],
        ];
    }

    // blogs(TABLE) SELECT *
    // user id 매개변수로 받아오기
    public function allBlogD($id) {
        $blogData = DB::table('blogs')
            ->join()
            ->where()
            ->get();

        return $blogData;
    }
}
