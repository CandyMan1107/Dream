<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Episode extends Model
{
    // TABLE : novel_episodes INSERT
    public function insertData($table) {
        $episodeData = [];
        $episodeData = [
            'belong_to_novel' => $table['belong_to_novel'],
            'is_charge' => $table['is_charge'],
            'is_notice' => $table['is_notice'],
            'cover_img_src' => $table['cover_img_src'],
            'episode_title' => $table['episode_title'],
            'episode' => $table['episode'],
            'writers_postscript' => $table['writers_postscript'],
            'char_count' => $table['char_count'],
        ];

        DB::table('novel_episodes')->insert($episodeData);
        // var_dump($table);
    }

    // TABLE : novel_episodes SELECT ALL
    public function dataSelectAll() {
        $episodeData = DB::table('novel_episodes')->get();
        // var_dump($episodeData);

        return $episodeData;
    }

    // TABLE : novels SELECT belong_to_novel, episode_title, created_at
    public function selectWithNovel() {
        $episodeData = DB::table("novel_episodes")->select("belong_to_novel", "episode_title", "created_at")->get();

        return $episodeData;
    }
}
