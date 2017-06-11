<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Character extends Model
{
    public function insert_character($character_info, $img_src){
        $dataSet = [];
        $dataSet = [
            'name' => $character_info['character_name'],
            'info' => $character_info['character_content'],
            'age' => $character_info['age'],
            'gender' => $character_info['gender'],
            'refer_info' => $character_info['refer_info'],
            'img_src' => $img_src,
        ];
        // data insert
        DB::table('characters')->insert($dataSet);
        // var_dump($table);
    }

    public function dataBringAll(){
        // characters 전체 data 가져오기
        $dataSet = DB::table('characters')->get();
        // var_dump($dataSet);

        return $dataSet;
    }
}
