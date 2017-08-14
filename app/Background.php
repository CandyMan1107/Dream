<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Background extends Model
{

    // TABLE : novel_backgrounds SELECT [CHARACTERS]
    public function selectCharacter($id) {
        $backgroundData = DB::table('novel_has_open_backgrounds')
            ->join('open_characters', 'novel_has_open_backgrounds.open_background_id', '=', 'open_characters.id')
            ->select('open_characters.*')
            ->where('novel_has_open_backgrounds.novel_id', '=', $id)
            ->where('novel_has_open_backgrounds.background_kind', '=', 'characters')
            ->get();

        return $backgroundData;
    }

    // TABLE : novel_backgrounds SELECT [ITEMS]
    public function selectItem($id) {
        $backgroundData = DB::table('novel_has_open_backgrounds')
            ->join('open_items', 'novel_has_open_backgrounds.open_background_id', '=', 'open_items.id')
            ->select('open_items.*')
            ->where('novel_has_open_backgrounds.novel_id', '=', $id)
            ->where('novel_has_open_backgrounds.background_kind', '=', 'items')
            ->get();

        return $backgroundData;
    }

    // TABLE : novel_backgrounds SELECT [RELATIONS]
    public function selectRelation($id) {
        $backgroundData = DB::table('novel_has_open_backgrounds')
            ->join('oepn_relations', 'novel_has_open_backgrounds.open_background_id', '=', 'oepn_relations.relnum')
            ->select('oepn_relations.*')
            ->where('novel_has_open_backgrounds.novel_id', '=', $id)
            ->where('novel_has_open_backgrounds.background_kind', '=', 'relations')
            ->get();

        return $backgroundData;
    }

    // TABLE : novel_backgrounds SELECT [TIMETABLES]
    public function selectHistory($id) {
        $backgroundData = DB::table('novel_has_open_backgrounds')
            ->join('open_timetables', 'novel_has_open_backgrounds.open_background_id', '=', 'open_timetables.id')
            ->select('open_timetables.*')
            ->where('novel_has_open_backgrounds.novel_id', '=', $id)
            ->where('novel_has_open_backgrounds.background_kind', '=', 'timetables')
            ->get();

        return $backgroundData;
    }

    // TABLE : novel_backgrounds SELECT [MAPS]
    public function selectMap($id) {
        $backgroundData = DB::table('novel_has_open_backgrounds')
            ->join('open_maps', 'novel_has_open_backgrounds.open_background_id', '=', 'open_maps.id')
            ->select('open_maps.*')
            ->where('novel_has_open_backgrounds.novel_id', '=', $id)
            ->where('novel_has_open_backgrounds.background_kind', '=', 'maps')
            ->get();

        return $backgroundData;
    }
    /***********************
    JJH 2017.08.03
    SELECT *
    FROM novel_backgrounds
    WHERE belong_to_novel = $novel_id
    WHERE id != $open_background
    WHERE novel_background = $kind
    ***********************/
    public function get_none_open_background($novel_id,$open_background,$kind){
        $data = DB::table('novel_backgrounds')
                ->where('belong_to_novel','=',$novel_id) 
                ->where('novel_background','=',$kind) 
                ->whereNotIn('background_id',$open_background)
                ->get();
        
        return $data;
    }
}
