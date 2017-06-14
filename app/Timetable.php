<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Timetable extends Model
{
    // table에 data insert 하기
    public function insert_table($table){
        // dataSet
        $dataSet = [];
        $dataSet = [
            'event_names' => $table['event_name'],
            'event_contents' => $table['event_content'],
            'add_items' => $table['add_items'],
            'start_days' => $table['start_day'],
            'end_days' => $table['end_day'],
            'others' => $table['other'],
            'characters' => $table['character'],
            'items' => $table['item'],
            'places' => $table['place'],
            // 'tag_ids' => $table[''],
        ];
        // data insert
        DB::table('timetables')->insert($dataSet);
        // var_dump($table);
    }

    public function dataBringAll(){
        // timetables 전체 data 가져오기
        $dataSet = DB::table('timetables')->get();
        // var_dump($dataSet);

        return $dataSet;
    }
}
