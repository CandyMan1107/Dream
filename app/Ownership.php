<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Ownership extends Model
{
    public function insert_ownership($character_id, $item_id){
        $dataSet = [];
        // echo($character_id);
        // echo($item_id);
        $dataSet = [
            'character_id' => $character_id,
            'item_id' => $item_id,
        ];
        // data insert
        DB::table('ownerships')->insert($dataSet);
    }
}
