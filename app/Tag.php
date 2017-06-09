<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
    public function insertTag($tag_data){
        echo ("df");
        echo ($tag_data['tag_name']);
        echo ($tag_data['page']);
        echo ($tag_data['tag_color']);
        echo ($tag_data['object_id']);
    }

    public function tagBring($page){
            // tags 전체 data 가져오기
            $tag_data = DB::table('tags')->where('kind',$page)->get();
            // var_dump($dataSet);

            return $tag_data;
    } 
}
