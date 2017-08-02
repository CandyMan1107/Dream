<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use  App\Blog;
use  App\BlogMenu;
use  App\BlogBoard;

use  App\BlogMenuRelation;
use  App\MenuBoardRelation;
use  App\BoardFileRelation;

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
                    $data[$i]['id'] = $datas->id;   // blog_board_id

                    $data[$i]['user_id'] = $datas->user_id; // blog_owner_id & user_id 구분하기
                    $data[$i]['blog_id'] = $datas->blog_id;
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

        // print_r($data);
        

        return view('writer_blog.blog_main')->with("data", $data);
    }

    public function showBlog($id) 
    {
        // Blog's OWNER user_id
        $blog_owner_id = $id;

        $board = new BlogBoard();
        $boardData = $board->allBoardD();
        $data = array(array());

        $i = 0;

        // print_r($boardData);

        if(empty($boardData)) {
            $data = 0;
        } else {
            foreach($boardData as $datas) {
                $data[$i]['id'] = $datas->id;   // blog_board_id

                $data[$i]['user_id'] = $datas->user_id; // blog_owner_id & user_id 구분하기
                $data[$i]['blog_id'] = $datas->blog_id;
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

        // print_r($data);
        

        return view('writer_blog.blog_main')->with("data", $data);
    }

    public static function showBlogSideMenu($id) 
    {
        $user_id = $id;

        // echo $user_id;

        $blog = new Blog();
        $blogData = $blog->allBlogD($user_id);

        $data = array(array());

        $i = 0;

        if (empty($blogData[0])) {
            // echo("empty!");

            $blogData = $blog->basicBlogD($user_id);

            foreach($blogData as $datas) {
                $data[$i]['id'] = $datas->id;   // blog auto-increments id

                $data[$i]['user_id'] = $datas->user_id;
                $data[$i]['blog_menu_id'] = "empty";

                // $data[$i]['cover_img_src'] = $datas->cover_img_src;
                $data[$i]['blog_introduce'] = $datas->blog_introduce;
                $data[$i]['today_hit'] = $datas->today_hit;
                $data[$i]['total_hit'] = $datas->total_hit;

                $i++;
            }
        } else {
            foreach($blogData as $datas) {
                $data[$i]['id'] = $datas->id;   // blog auto-increments id

                $data[$i]['user_id'] = $datas->user_id;
                $data[$i]['blog_menu_id'] = $datas->blog_menu_id;

                // $data[$i]['cover_img_src'] = $datas->cover_img_src;
                $data[$i]['blog_introduce'] = $datas->blog_introduce;
                $data[$i]['today_hit'] = $datas->today_hit;
                $data[$i]['total_hit'] = $datas->total_hit;

                $i++;
            }
        }

        // print_r($data);
        
        return view('writer_blog.blogSideMenu')->with("data", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @return $data = $blog_id
     */
    public function create()
    {
        //
        // echo ("create() RUNNING");


        // return view('writer_blog.board.write_form')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @return $data = $blog_id
     */
    public function createBoard($id)
    {
        //
        // echo ("create() RUNNING");

        $blog_id = $id;


        return view('writer_blog.board.write_form')->with('blog_id', $blog_id);
    }

    public static function wirteFormMenuList($id)
    {
        $blog_id = $id;

        $menu = new BlogMenu();
        $menuData = $menu->allMenuD();

        $data = array(array());
        $i = 0;

        foreach ($menuData as $datas) {
            $data[$i]['id'] = $datas->id;

            $data[$i]['blog_id'] = $datas->blog_id;

            $data[$i]['menu_title'] = $datas->menu_title;

            $i++;
        }
        
        return view('writer_blog.board.select_menu_list')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return blog_set_main.blade.php
     */
    public function createMenu($id)
    {
        $user_id = $id;

        // echo $user_id;

        // 메뉴 테이블 전체의 메뉴 아이디 및 메뉴 제목, 블로그 아이디 게시글 아이디
        $menu = new BlogMenu();
        $menuData = $menu->allMenuD();
        // print_r($menuData);

        $data = array(array());

        $i = 0;

        if ($menuData == "empty") {
            $data[0]['id'] = 0;
        } else {
            foreach($menuData as $datas) {
                $data[$i]['id'] = $datas->id;   // menu auto-increments id

                $data[$i]['blog_id'] = $datas->blog_id;
                // $data[$i]['blog_board_id'] = $datas->blog_board_id;

                $data[$i]['menu_title'] = $datas->menu_title;

                $i++;
            }
        }

        // print_r($data);

        return view('writer_blog.set.menu.blog_set_menu')->with('data', $data);
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
        $data = $request->all();

        // print_r($data['blog_id']);


        $board = new BlogBoard();
        $blog_menu_board_relation = new MenuBoardRelation();

        // INSERT DATAS INTO blog_boards TABLE
        $blog_board_id = $board->newBoardD($data);

        // INSERT DATAS INTO menu_board_relations TABLE
        $blog_menu_board_relation->insertRelationD($data['blog_menu_id'], $blog_board_id);

        return redirect(route('blog.index'));
    }

    public function storeMenu(Request $request)
    {
        //
        // echo("PASS"); 

        $data = $request->all();

        // print_r($data);

        // echo($data['blog_id']);

        $menu = new BlogMenu();
        $blog_menu_relation = new BlogMenuRelation();

        // INSERT DATAS INTO blog_boards TABLE
        $blog_menu_id = $menu->newMenuD($data);

        // INSERT DATAS INTO menu_board_relations TABLE
        $blog_menu_relation->insertRelationD($data['blog_id'], $blog_menu_id);

        return redirect(route('blog.index'));
    }

    /**
     * Display the specified resource.
     * Display the Boards of Blog.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Is There "&"?
        if (strpos($id, "&")!==false) {
            $hrefArr = explode('&', $id);

            // print_r($hrefArr);

            $blog_menu_id = $hrefArr[0];
            $post_id = $hrefArr[1];

            $board = new BlogBoard();
            $boardData = $board->selectedBoardD($blog_menu_id, $post_id);

            $data = array(array());
            $i = 0;

            foreach ($boardData as $datas) {
                $data[$i]['id'] = $datas->id;
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

            // print_r($data);
        } else {
            $blog_menu_id = $id;
            // selectedMenuD($blog_menu_id)
        }
        

        //return $data;
    }

    /**
     * Display the specified resource.
     * Display the setting-maps-main of Blog.
     * @return blog_set_main.blade.php
     */
    public function viewSetMapMain($id)
    {
        // echo $id;
        $user_id = $id;

        return view('writer_blog.set.blog_set_main')->with('user_id', $user_id);
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
    * Display ALL Boards of Blog.
    * @return all_boards_view.blade.php
    */
    public static function allBoard()
    {
        $board = new BlogBoard();
        $boardData = $board->orderAllBoardD();

        // print_r($boardData);



        return view('writer_blog.all_boards_view', ['boardData' => $boardData]);
    }

    /**
     * Display ALL Menus of Blog.
     * @return all_menu_list.blade.php
     */
    public static function showAllMenu($id)
    {
        $blog_id = $id;

        // echo($blog_id);

        $menu = new BlogMenu();
        $menuData = $menu->allMenuD();

        // print_r($menuData);

        $data = array(array());
        $i = 0;

        foreach ($menuData as $datas) {
            $data[$i]['id'] = $datas->id;   // blog-menu auto increments id

            // $data[$i]['blog_id'] = $datas->blog_id;

            $data[$i]['menu_title'] = $datas->menu_title;

            $i++;
        }

        // print_r($data);

        return view('writer_blog.part.blog_menu_list')->with('data', $data);
    }

    /**
     * Display View of the Selected Menu.
     * @return selected_menu_view.blade.php
     */
    public function showMenuView($id) 
    {
        $blog_menu_id = $id;

        // echo($blog_menu_id);

        // return view('writer_blog.selected_menu_view')->with('data', $data);
    }

    /**
     * Display View All Boards of the Selected Menu.
     * @return selected_menu_view.blade.php
     */
    public static function selectedMenu($id) 
    {
        $blog_menu_id = $id;

        // echo($blog_menu_id);

        $menuBoard = new BlogBoard();
        $menuBoardD = $menuBoard->selectedMenuBoardD($blog_menu_id);

        // $data = array(array());
        // $i = 0;

        //nvar_dump($menuBoardD);
        // print_r($menuBoardD);

        if(empty($menuBoardD[0])) {
            // echo("empty!");

            $data = "empty";
        } else {
            // foreach($menuBoardD as $datas) {
                // $data[$i]['id'] = $datas->id;   // blog_board_id

                // $data[$i]['user_id'] = $datas->user_id; // blog_owner_id & user_id 구분하기

                $data = $blog_menu_id;

                // $data[$i]['board_title'] = $datas->board_title;
                // $data[$i]['is_notice'] = $datas->is_notice;
                // // $data[$i]['board_hit'] = $datas->board_hit;
                // // $data[$i]['board_like'] = $datas->board_like;
                // $data[$i]['board_content'] = $datas->board_content;
                // $data[$i]['created_at'] = $datas->created_at;
                // $data[$i]['updated_at'] = $datas->updated_at;

                // // show($id)'s $id : blog_menu_id&id
                // $hrefArr = array($data[$i]['blog_menu_id'], $data[$i]['id']);
                // $data[$i]['href'] = implode("&", $hrefArr);

                // $i++;
            // }
        }

        // echo($data);
        

        return view('writer_blog.selected_menu_view')->with('data', $data);
    }

    /**
     * Display View All Boards of the Selected Menu.
     * @return selected_menu_view.blade.php
     */
    public static function selectedMenuAllB($id) 
    {
        $blog_menu_id = $id;

        // print_r($blog_menu_id);

        $menuBoard = new BlogBoard();
        $data = $menuBoard->selectedMenuBoardD($blog_menu_id);
        
        return view('writer_blog.selected_menu_board', ['data' => $data]);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyMenu($id)
    {
        //
    }
}
