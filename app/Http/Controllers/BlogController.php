<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use  App\Blog;
use  App\BlogMenu;
use  App\BlogBoard;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

            $board = new BlogBoard();
            $boardData = $board->allBoardD();
            $data = array(array());

            $i = 0;

            // print_r($boardData);

            if(empty($boardData)) {
                $data = 0;
            } else {
                foreach($boardData as $datas) {
                    $data[$i]['id'] = $datas->id;
                    $data[$i]['blog_menu_id'] = $datas->blog_menu_id;
                    $data[$i]['board_title'] = $datas->board_title;
                    $data[$i]['is_notice'] = $datas->is_notice;
                    // $data[$i]['board_hit'] = $datas->board_hit;
                    // $data[$i]['board_like'] = $datas->board_like;
                    $data[$i]['board_content'] = $datas->board_content;
                    $data[$i]['created_at'] = $datas->created_at;
                    $data[$i]['updated_at'] = $datas->updated_at;

                    // show($id)'s $id : blog_menu_id&id
                    $hrefArr = array($data[$i]['blog_menu_id'], $data[$i]['id']);
                    $data[$i]['href'] = implode("&", $hrefArr);

                    $i++;
                }
            }
        

        return view('writer_blog.blog_main')->with("data", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // echo ("create() RUNNING");
        return view('writer_blog.board.write_form');
    }

    public function createMenu()
    {
        //

        
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $board = new BlogBoard();

        $data = $request->all();

        // print_r($data);

        $board->insertBoardD($data);

        return redirect(route('blog.index'));
    }

    public function storeMenu(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     * Display the Boards of Blog.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = explode('&', $id);

        // print_r($data);

        return view('writer_blog.board.selected_board_view', ['data' => $data]);
    }

    /**
     * Display the selected Board's view.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function selectedBoard($data)
    {
        //
        $idArr = $data;

        $blog_menu_id = $idArr[0];
        $post_id = $idArr[1];

        $board = new BlogBoard();
        $boardData = $board->selectedBoardD($blog_menu_id, $post_id);

        // print_r($boardData);

        return view('writer_blog.all_boards_view', ['boardData' => $boardData]);
    }

    /**
    * Display ALL Boards of Blog.
    * @return board_view.blade.php
    */
    public static function allBoard()
    {
        $board = new BlogBoard();
        $boardData = $board->orderAllBoardD();

        // print_r($boardData);

        return view('writer_blog.all_boards_view', ['boardData' => $boardData]);
    }

    /**
    * Display the mainNoticeList with noticeList()'s $data
    * @return view main_notice_list.blade.php
    */
    public static function mainNoticeList() {
        $boardTable = new BlogBoard();

        $noticeList = $boardTable->noticeListBoardD();

        $data = array(array());
        $i = 0;
        
        foreach($noticeList as $datas) {
            $data[$i]['id'] = $datas->id;
            $data[$i]['blog_menu_id'] = $datas->blog_menu_id;
            $data[$i]['board_title'] = $datas->board_title;
            $data[$i]['is_notice'] = $datas->is_notice;
            $data[$i]['created_at'] = $datas->created_at;
            $data[$i]['updated_at'] = $datas->updated_at;

            // show($id)'s $id : blog_menu_id&id
            $hrefArr = array($data[$i]['blog_menu_id'], $data[$i]['id']);
            $data[$i]['href'] = implode("&", $hrefArr);

            $i++;
        }

        // var_dump($data);

        return view('writer_blog.part.main_notice_list')->with('data', $data);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
