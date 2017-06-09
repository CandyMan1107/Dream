<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Input;

class writeNovelController extends Controller
{
    public function setNovelView(){
      $tasks = DB::table("cover_images")->select("cover_img_src")->get();
      return view('write_novel/write_novel_set')->with("tasks", $tasks);
    }

    public function myNovelView(){
      return view('write_novel/my_novel');
    }

    // DB 소설 생성
    public function createNovel(Request $request){
      $title          = $request->input('title');
      $genre          = $request->input('genre');
      $publishPeriod  = $request->input('publishPeriod');
      $publishDays    = $request->input('publishDays');
      $coverImg       = $request->input('coverImg');
      $detailIntro    = $request->input('detailIntro');
      $summaryIntro   = $request->input('summaryIntro');
      $mytime         = date('Y-m-d H:i:s');

      DB::table("novels")->insert([
        "title"         => $title,
        "intro"         => $detailIntro,
        "summary_intro" => $summaryIntro,
        "cover_img_src" => $coverImg,
        "publish_case"  => $publishPeriod,
        "period"        => $publishDays,
        "genre"         => $genre,
        "created_at"    => $mytime
      ]);

      $novelId = DB::table("novels")->max("id");

      DB::table("novel_writers")->insert([
        "user_id"   => 1,
        "novel_id"  => $novelId
      ]);

      return $novelId;
    }

    // 소설 정보 가져옴
    public function getNovelInfo(Request $request){
      $userId = $request->input('userId');

      return $userId;
    }
}
