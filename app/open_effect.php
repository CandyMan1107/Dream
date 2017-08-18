<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class open_effect extends Model
{
    public function insert_open_effect($table_id, $data){
        $dataSet = [];
        
        // 등장인물 데이터 insert
        if(isset($data['characters']['content'])){
            for( $i = 0 ;  count($data['characters']['content']) > $i ; $i++){
                $dataSet = [
                    'timetable_id' => (int)$table_id,
                    'affect_table' => "characters",
                    'affect_id' => (int)$data['characters']['id'][$i],
                    'affect_content' => (string)$data['characters']['content'][$i],
                ];
                // echo((int)$data['characters']['id'][$i]);
                DB::table('open_effects')->insert($dataSet);
            }
        }
        
        // 등장사물 데이터 insert
        if(isset($data['items']['content'])){
            for( $i = 0 ;  count($data['items']['content']) > $i ; $i++){
                $dataSet = [
                    'timetable_id' => (int)$table_id,
                    'affect_table' => "items",
                    'affect_id'=>(int)$data['items']['id'][$i],
                    'affect_content'=>(string)$data['items']['content'][$i],
                ];
                // echo((int)$data['characters']['id'][$i]);
                DB::table('open_effects')->insert($dataSet);
            }
        }

        // 배경장소 데이터 insert
        if(isset($data['maps']['content'])){
            for( $i = 0 ;  count($data['maps']['content']) > $i ; $i++){
                $dataSet = [
                    'timetable_id'=>(int)$table_id,
                    'affect_table'=>"maps",
                    'affect_id'=>(int)$data['maps']['id'][$i],
                    'affect_content' => (string)$data['maps']['content'][$i],
                ];
                // var_dump($dataSet);
                DB::table('open_effects')->insert($dataSet);
            }
        }

        if(isset($data['relations']['content'])){
            for( $i = 0 ;  count($data['relations']['content']) > $i ; $i++){
                $dataSet = [
                    'timetable_id'=>(int)$table_id,
                    'affect_table'=>"relations",
                    'affect_id'=>(int)$data['relations']['id'][$i],
                    'affect_content' => (string)$data['relations']['content'][$i],
                ];
                // var_dump($dataSet);
                DB::table('open_effects')->insert($dataSet);
            }
        }
    }
    public function get_open_effect_data($table_id){
        $effect_data = DB::table('open_effects')
        ->select('affect_table','affect_id','affect_content')
        ->where('timetable_id',$table_id)
        ->get();
        
        return $effect_data;
    }
}
