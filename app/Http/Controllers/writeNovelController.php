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

      $userId = 1;
      $pageNum = 2; // 페이지당 보일 수
      // novels + novel_writers 조인 후 유저와 일치하는 값 호출
      $novelInfo = DB::table("novels")->join("novel_writers","novels.id", "=", "novel_writers.novel_id")->where("novel_writers.user_id", "=",$userId)->paginate($pageNum);
      return $novelInfo;
    }

    // 해당 소설의 아이디에 대한 회차 정보 호출
    public function getEpisodeInfo(Request $request){

      $novelId = $request->input('novelId');
      $episodeInfo = DB::table("novel_episodes")->where("belong_to_novel", "=",$novelId)->get();
      return $episodeInfo;
    }

    // 회차 작성 뷰
    public function writeNovelEpisodeView ($data, Request $request){
      return $data;
    }

}
