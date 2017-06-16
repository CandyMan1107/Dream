<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Storage;
use File;

class Map extends Model
{
    public function insert_map($map_info, $img_src){
        $dataSet = [];
        $dataSet = [
            'name' => $map_info['character_name'],
            'info' => $map_info['character_content'],
            'age' => $map_info['age'],
            'gender' => $map_info['gender'],
            'refer_info' => $map_info['refer_info'],
            'img_src' => $img_src,
        ];
        // data insert
        DB::table('characters')->insert($dataSet);
        // var_dump($table);
    }
}
