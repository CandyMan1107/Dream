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

    // TABLE : novels SELECT
    public function dataIdSelect($id) {
        $novelData = DB::table('novels')
        ->where('id', '=', $id)
        ->get();

        return $novelData;
    }

    // TABLE : novels SELECT title
    public function titleSelect() {
        $novelData = DB::table('novels')->select("id", "title")->get();

        return $novelData;
    }
}
