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

    // TABLE : novel_episodes SELECT // JOIN TABLE : novels
    public function dataJoinNovel($id) {
        $episodeData = DB::table('novel_episodes')
            ->join('novels', 'novel_episodes.belong_to_novel', '=', 'novels.id')
            ->select('novel_episodes.*', 'novels.title')
            ->where('novel_episodes.belong_to_novel', '=', $id)
            ->where('novels.id', '=', $id)
            ->get();

        return $episodeData;
    }

    // TABLE : novel_episodes SELECT // SELECT episode_title
    public function episodeTitle($id) {
        $episodeData = DB::table('novel_episodes')
            ->join('novels', 'novel_episodes.belong_to_novel', '=', 'novels.id')
            ->select('novel_episodes.episode_title')
            ->where('novel_episodes.belong_to_novel', '=', $id)
            ->where('novels.id', '=', $id)
            ->get();

        return $episodeData;
    }
}
