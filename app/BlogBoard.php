<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BlogBoard extends Model
{
    //
    // blog_boards(TABLE) INSERT DATAS
    public function newBoardD($data) {
        $dataSet = [];

        if (empty($data['is_notice'])) {
            $dataSet = [
                'board_title' => $data['board_title'],
                'is_notice' => 'off',
                // 'board_hit' => $data['board_hit'],
                // 'board_like' => $data['board_like'],
                'board_content' => $data['board_content'],
            ];
        } else {
            $dataSet = [
                // 'blog_menu_id' => $data['blog_menu_id'],
                'board_title' => $data['board_title'],
                'is_notice' => $data['is_notice'],  // INSERT DATA : on
                // 'board_hit' => $data['board_hit'],
                // 'board_like' => $data['board_like'],
                'board_content' => $data['board_content'],
            ];
        }

        // print_r($dataSet);

        $blog_board_id = DB::table('blog_boards')->insertGetId($dataSet);

        return $blog_board_id;
    }

    // blog_boards(TABLE) SELECT *
    // JOIN menu_board_relations(TABLE)
    // user id 매개변수로 받아오기
    public function allBoardD() {
        $boardData = DB::table('blog_boards')
            ->join('menu_board_relations', 'blog_boards.id', '=', 'menu_board_relations.blog_board_id')
            ->join('blog_menu_relations', 'menu_board_relations.blog_menu_id', '=', 'blog_menu_relations.blog_menu_id')
            ->join('user_blog_relations', 'blog_menu_relations.blog_id', '=', 'user_blog_relations.blog_id')
            ->select('blog_boards.*', 'menu_board_relations.blog_menu_id', 'blog_menu_relations.blog_id', 'user_blog_relations.user_id')
            ->get();

        return $boardData;
    }

    // blog_boards(TABLE) SELECT *
    // JOIN menu_board_relations(TABLE)
    // user id 매개변수로 받아오기
    // orderBy blog_boards.created_at desc
    public function orderAllBoardD() {
        $boardData = DB::table('blog_boards')
            ->join('menu_board_relations', 'blog_boards.id', '=', 'menu_board_relations.blog_board_id')
            ->select('blog_boards.*', 'menu_board_relations.blog_menu_id')
            ->orderBy('created_at', 'desc')
            ->paginate(1, ['*'], 'boardData');

        return $boardData;
    }

    // blog_boards(TABLE) 
    // SELECT id, blog_menu_id, board_title, is_notice, created_at, updated_at
    // JOIN menu_board_relations(TABLE)
    // WHERE is_notice = 'on'
    public function noticeListBoardD() {
        $boardData = DB::table('blog_boards')
           ->join('menu_board_relations', 'blog_boards.id', '=', 'menu_board_relations.blog_board_id')
           ->select('blog_boards.*', 'menu_board_relations.blog_menu_id')
           ->where('blog_boards.is_notice', '=', 'on')
           ->orderBy('created_at', 'desc')
           ->get();

        return $boardData;
    }

    // blog_boards(TABLE)
    // SELECT *
    // JOIN menu_board_relations(TABLE)
    // WHERE blog_menu_id = $blog_menu_id
    // AND id = $post_id
    public function selectedBoardD($blog_menu_id, $post_id) {
        $boardData = DB::table('blog_boards')
           ->join('menu_board_relations', 'blog_boards.id', '=', 'menu_board_relations.blog_board_id')
           ->select('blog_boards.*', 'menu_board_relations.blog_menu_id')
           ->where('blog_boards.id', '=', $post_id)
           ->where('menu_board_relations.blog_menu_id', '=', $blog_menu_id)
           ->orderBy('created_at', 'desc')
           ->paginate(1, ['*'], 'data');

        return $boardData;
    }
}
