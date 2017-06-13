<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Map extends Model
{
    public function insert_map_info($map_info, $img_src){
        $dataSet = [];
        $dataSet = [
            'id' => $map_info['map_id'],
            'name' => $map_info['map_name'],
            'specific' => $character_info['map_specific'],
            'img_src' => $img_src,
        ];
        // data insert
        DB::table('maps')->insert($dataSet);
        // var_dump($table);
    }

    public function dataBringAll(){
        // characters 전체 data 가져오기
        $dataSet = DB::table('maps')->get();
        // var_dump($dataSet);

        return $dataSet;
    }
}
