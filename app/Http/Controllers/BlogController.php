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
                $data[$i]['blog_menu_id'] = $datas->blog_menu_id;
                $data[$i]['board_title'] = $datas->board_title;
                $data[$i]['is_notice'] = $datas->is_notice;
                // $data[$i]['board_hit'] = $datas->board_hit;
                // $data[$i]['board_like'] = $datas->board_like;
                $data[$i]['board_content'] = $datas->board_content;
                $data[$i]['created_at'] = $datas->created_at;
                $data[$i]['updated_at'] = $datas->updated_at;

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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $boardData = App\BlogBoard::paginate(1, ['*'], 'boardData');

        return view('writer_blog.board.board_view', ['boardData' => $boardData]);
    }

    public static function mainNoticeList() {
        $boardTable = new BlogBoard();

        $noticeList = $boardTable->noticeListBoardD();

        $data = array(array());
        $i = 0;

        foreach($noticeList as $datas) {
            $data[$i]['blog_menu_id'] = $datas->blog_menu_id;
            $data[$i]['board_title'] = $datas->board_title;
            $data[$i]['is_notice'] = $datas->is_notice;
            $data[$i]['created_at'] = $datas->created_at;
            $data[$i]['updated_at'] = $datas->updated_at;

            $i++;
        }

        var_dump($data);

        // return view('writer_blog.part.main_notice_list')->with('data', $data);
    }

    public static function mainNotice() {
        $noticeData = BlogBoard::where('is_notice', '=', 'on')->orderBy('id', 'desc')->paginate(1, ['*'], 'noticeData');

        return view('writer_blog.part.main_notice', ['noticeData' => $noticeData]);
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
