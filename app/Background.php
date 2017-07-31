<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Background extends Model
{
    
    // TABLE : novel_backgrounds INSERT
    public function insertData($table) {
        $backgroundData = [];
        $backgroundData = [
            'belong_to_novel' => $table['belong_to_novel'], // 소설아이디
            'novel_background' => $table['novel_background'],   
            // 배경설정종류 테이블명 : characters, items, relations, timetables, maps
            'background_id' => $table['background_id'] // 각 배경 설정 정보 요소의 ID
        ];

        DB::table('novel_backgrounds')->insert($backgroundData);
    }

    // TABLE : novel_backgrounds SELECT [CHARACTERS]
    public function selectCharacter($id) {
        $backgroundData = DB::table('novel_backgrounds')
            ->join('characters', 'novel_backgrounds.background_id', '=', 'characters.cha_id')
            ->select('characters.*')
            ->where('novel_backgrounds.belong_to_novel', '=', $id)
            ->where('novel_backgrounds.novel_background', '=', 'characters')
            ->get();

        return $backgroundData;
    }

    // TABLE : novel_backgrounds SELECT [ITEMS]
    public function selectItem($id) {
        $backgroundData = DB::table('novel_backgrounds')
            ->join('items', 'novel_backgrounds.background_id', '=', 'items.id')
            ->select('items.*')
            ->where('novel_backgrounds.belong_to_novel', '=', $id)
            ->where('novel_backgrounds.novel_background', '=', 'items')
            ->get();

        return $backgroundData;
    }

    // TABLE : novel_backgrounds SELECT [RELATIONS]
    public function selectRelation($id) {
        $backgroundData = DB::table('novel_backgrounds')
            ->join('relations', 'novel_backgrounds.background_id', '=', 'relations.relnum')
            ->select('relations.*')
            ->where('novel_backgrounds.belong_to_novel', '=', $id)
            ->where('novel_backgrounds.novel_background', '=', 'relations')
            ->get();

        return $backgroundData;
    }

    // TABLE : novel_backgrounds SELECT [TIMETABLES]
    public function selectHistory($id) {
        $backgroundData = DB::table('novel_backgrounds')
            ->join('timetables', 'novel_backgrounds.background_id', '=', 'timetables.id')
            ->select('timetables.*')
            ->where('novel_backgrounds.belong_to_novel', '=', $id)
            ->where('novel_backgrounds.novel_background', '=', 'timetables')
            ->get();

        return $backgroundData;
    }

    // TABLE : novel_backgrounds SELECT [MAPS]
    public function selectMap($id) {
        $backgroundData = DB::table('novel_backgrounds')
            ->join('maps', 'novel_backgrounds.background_id', '=', 'maps.id')
            ->select('maps.*')
            ->where('novel_backgrounds.belong_to_novel', '=', $id)
            ->where('novel_backgrounds.novel_background', '=', 'maps')
            ->get();

        return $backgroundData;
    }
}
