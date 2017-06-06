<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Episode extends Model
{
    // TABLE : novel_episodes INSERT

    // TABLE : novel_episodes SELECT ALL
    public function dataSelectAll() {
        $episodeData = DB::table('novel_episodes')->get();
        // var_dump($episodeData);

        return $episodeData;
    }
}
