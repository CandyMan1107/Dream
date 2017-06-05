<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Timetable extends Model
{
    public function insert_table($table){
        $dataSet = [];
        $dataSet = [
            'event_names' => $table['event_name'],
            'event_contents' => $table['event_content'],
            'add_items' => $table['add_items'],
            'start_days' => $table['start_day'],
            'end_days' => $table['end_day'],
            // 'tag_ids' => $table[''],
        ];
        DB::table('timetables')->insert($dataSet);
        // var_dump($table);
    }

    public function dataBringAll(){
        $dataSet = DB::table('timetables')->get();
        // var_dump($dataSet);

        return $dataSet;
    }
}
