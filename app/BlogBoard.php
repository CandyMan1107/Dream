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

    // blog_boards(TABLE) SELECT *
    // user id 매개변수로 받아오기
    // orderBy id desc
    public function orderAllBoardD() {
        $boardData = DB::table('blog_boards')
            ->orderBy('created_at', 'desc')
            ->paginate(1, ['*'], 'boardData');

        return $boardData;
    }

    // blog_boards(TABLE) 
    // SELECT id, blog_menu_id, board_title, is_notice, created_at, updated_at
    // WHERE is_notice = 'on'
    public function noticeListBoardD() {
        $boardData = DB::table('blog_boards')
            ->select('id', 'blog_menu_id', 'board_title', 'is_notice', 'created_at', 'updated_at')
            ->where('is_notice', '=', 'on')
            ->orderBy('created_at', 'desc')
            ->get();

        return $boardData;
    }

    // blog_boards(TABLE)
    // SELECT *
    // WHERE blog_menu_id = $blog_menu_id
    // AND id = $post_id
    public function selectedBoardD($blog_menu_id, $post_id) {
        $boardData = DB::table('blog_boards')
            ->where('blog_menu_id', '=', $blog_menu_id)
            ->where('id', '=', $post_id)
            ->orderBy('created_at', 'desc')
            ->paginate(1, ['*'], 'data');

        return $boardData;
    }
}
