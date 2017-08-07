<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class novel_has_open_background extends Model
{
    //
    public function get_background_id_by_novel_id($novel_id,$kind){
        $data = DB::table('novel_has_open_backgrounds')
                ->where('novel_id','=',$novel_id)
                ->where('background_kind','=',$kind)
                ->get();
        
        // var_dump($data);
        return $data;
    }

    public function insert_open_relation($novel_id,$kind,$open_background_id,$background_id){
        $dataSet = [];
        $dataSet = [
            'novel_id' => $novel_id,
            'background_kind' => $kind,
            'open_background_id' => $open_background_id,
            'background_id' => $background_id,
        ];
        // data insert
        $id = DB::table('novel_has_open_backgrounds')->insertGetId($dataSet);
        // var_dump($table);
        return $id;
    }

    /******************************************
    JJH 2017.08.06
    SELECT *
    FROM novel_has_open_backgrounds, open_characters
    WHERE open_characters.id = novel_has_open_background.get_background_id_by_novel_id
    WHERE novel_has_open_background.background_kind = characters
    WHERE novel_has_open_background.novel_id = $novel_id
    ******************************************/
    public function get_data_by_open_character($novel_id){
        $data = DB::table('novel_has_open_backgrounds')
                ->join('open_characters','open_characters.id','=','novel_has_open_backgrounds.background_id')
                ->where('background_kind',"characters")
                ->where('novel_id',$novel_id)
                ->get();
        
        // var_dump($data);
        return $data;
    }

    /******************************************
    JJH 2017.08.07
    SELECT *
    FROM novel_has_open_backgrounds, open_items
    WHERE open_items.id = novel_has_open_background.get_background_id_by_novel_id
    WHERE novel_has_open_background.background_kind = items
    WHERE novel_has_open_background.novel_id = $novel_id
    ******************************************/
    public function get_data_by_open_item($novel_id){
        $data = DB::table('novel_has_open_backgrounds')
                ->join('open_items','open_items.id','=','novel_has_open_backgrounds.background_id')
                ->where('background_kind',"items")
                ->where('novel_id',$novel_id)
                ->get();
        
        // var_dump($data);
        return $data;
    }
}
