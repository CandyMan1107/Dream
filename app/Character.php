<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    public function insert_character($character_info, $img_src){
        echo $character_info['character_name'];
        echo $character_info['character_content'];
        echo $character_info['refer_info'];
        echo $character_info['age'];
        echo $character_info['gender'];

        echo $img_src;
        $dataSet = [];
        $dataSet = [
            'name' => $character_info['character_name'],
            'info' => $character_info['character_content'],
            'info' => $character_info['age'],
            'info' => $character_info['gender'],
            'info' => $character_info['refer_info'],
            'info' => $img_src,
        ];
        // data insert
        // DB::table('timetables')->insert($dataSet);
        // var_dump($table);
    }
}
