<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use  App\User;

use App\UserBlogRelation; 
use App\CommunicationRelation; 
// Communication Menu & Board Relation
use App\BlogCommunicationRelation;

use App\CommunicationMenu;
use App\CommunicationBoard;

class CommunicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display View All Boards of the COMMUNICATION Menu.
     * @param $blog_id (DataType : INTEGER)
     * @return view('writer_blog.all_comunication_boards')
     */
    public static function allCommunicationB($id)
    {
        $blogId = $id;
        // (모델 이용) 독자게시판에 작성된 글의 id, 제목, 작성자, 작성일, 조회수, 추천이 나와야한다
        // 

        $communicationB = new CommunicationBoard;
        $communicaitonBD = $communicationB->allBoardD($blogId);

        if(empty($communicaitonBD[0])) {
            // echo("EMPTY");
            $data[0]['blogId'] = $blogId;
            $data[0]['empty'] = 0;
        } else {
            $data = array(array());
            $i = 0;

            foreach ($communicaitonBD as $datas) {
                //
                $i++;
            }
        }


        return view('writer_blog.all_comunication_boards')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCommunityBoard($ownerId)
    {
        // blogSideMenu DataType STRING blog_owner_id 
        // blog_id

        // DataType : STRING
        $data['blog_owner_id'] = $ownerId;

        // echo($blog_owner_id);

        $userBlogR = new UserBlogRelation();
        $userBlogRD = $userBlogR->checkUserId($data['blog_owner_id']);

        // print_r($userBlogRD);

        foreach ($userBlogRD as $datas) {
            $data['blog_id'] = $datas->blog_id;
        }

        // var_dump(is_int($data['blog_id']));



        //return view('writer_blog.board.write_form')->with('data', $data);
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
