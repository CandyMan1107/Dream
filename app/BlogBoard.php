<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BlogBoard extends Model
{
    //
    // blog_boards(TABLE) INSERT DATAS
    public function insertBoardD($data) {
        $dataSet = [];

        if (empty($data['is_notice'])) {
            $dataSet = [
                'blog_menu_id' => $data['blog_menu_id'],
                'board_title' => $data['board_title'],
                'is_notice' => 'off',
                // 'board_hit' => $data['board_hit'],
                // 'board_like' => $data['board_like'],
                'board_content' => $data['board_content'],
            ];
        } else {
            $dataSet = [
                'blog_menu_id' => $data['blog_menu_id'],
                'board_title' => $data['board_title'],
                'is_notice' => $data['is_notice'],  // INSERT DATA : on
                // 'board_hit' => $data['board_hit'],
                // 'board_like' => $data['board_like'],
                'board_content' => $data['board_content'],
            ];
        }

        // print_r($dataSet);

        DB::table('blog_boards')->insert($dataSet);
    }

    // blog_boards(TABLE) SELECT *
    // user id 매개변수로 받아오기
    public function allBoardD() {
        $boardData = DB::table('blog_boards')->get();

        return $boardData;
    }

    // blog_boards(TABLE) 
    // SELECT blog_menu_id, board_title, is_notice, created_at, updated_at
    // WHERE is_notice = 'on'
    public function noticeListBoardD() {
        $boardData = DB::table('blog_boards')
            ->select('id', 'blog_menu_id', 'board_title', 'is_notice', 'created_at', 'updated_at')
            ->where('is_notice', '=', 'on')
            ->orderBy('id', 'desc')
            ->get();

        return $boardData;
    }
}
