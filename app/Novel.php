<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Novel extends Model
{
    // TABLE : novels INSERT
    public function insertData($table) {
        $novelData = [];
        $novelData = [
            'title' => $table['title'],
            'intro' => $table['intro'],
            'summary_intro' => $table['summary_intro'],
            'cover_img_src' => $table['cover_img_src'],
            'publish_case' => $table['publish_case'],
            'period' => $table['period'],
            'genre' => $table['genre'],
        ];

        DB::table('novels')->insert($novelData);
    }

    // TABLE : novels SELECT // JOIN TABLE : novel_episodes
    public function dataJoinEpisode($id) {

        $novelData = DB::table('novels')
            ->join('novel_episodes', 'novels.id', '=', 'novel_episodes.belong_to_novel')
            ->select('novels.*', 'novel_episodes.id','novel_episodes.belong_to_novel', 'novel_episodes.episode_title', 'novel_episodes.created_at')
            ->where('novels.id', '=', $id)
            ->where('novel_episodes.belong_to_novel', '=', $id)
            ->get();

        return $novelData;
    }
}
