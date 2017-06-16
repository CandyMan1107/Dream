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

    // DB 회차 생성
    public function createEpisode(Request $request){
      $novelId    = $request->input("novelId");
      $isNotice   = $request->input('isNotice');
      $isCharge   = $request->input('isCharge');
      $coverImg   = $request->input('coverImg');
      $title      = $request->input('title');
      $episode    = $request->input('episode');
      $charCount = strlen($episode);
      $postScript = $request->input('postScript');
      $mytime     = date('Y-m-d H:i:s');

      DB::table("novel_episodes")->insert([
        "belong_to_novel"     => $novelId,
        "is_charge"           => $isCharge,
        "is_notice"           => $isNotice,
        "cover_img_src"       => $coverImg,
        "episode_title"       => $title,
        "episode"             => $episode,
        "char_count"          => $charCount,
        "writers_postscript"  => $postScript,
        "created_at"          => $mytime
      ]);

      // $test = array(
      //   $novelId, $isCharge, $isNotice, $coverImg, $title, $episode, $charCount, $postScript, $mytime
      // );

      return "success";
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
    public function writeNovelEpisodeView ($novelId, Request $request){
      $coverImg = DB::table("cover_images")->select("cover_img_src")->get();
      $novelTitle = DB::table("novels")->select("title")->where("id", "=",$novelId)->get();
      $novelTitle = $novelTitle[0]->title;

      $tasks = array(
        "coverImg" => $coverImg,
        "novelTitle" => $novelTitle,
        "novelId"   => $novelId

      );

      return view('write_novel/write_episode_view')->with("tasks",$tasks);
    }

    // 태그 정보 호출
    // 해당 소설의 아이디에 대한 회차 정보 호출
    public function getTags(Request $request){
       $tagCase = $request->input('tagCase');
       $tagInfo = DB::table("tags")->select("kind","object_id","color","tag_name as value")->where("kind", "=",$tagCase)->get();
       return $tagInfo;
    }

    // 소설 배경설정 정보 호출
    public function callBackgroundInfo(Request $request){
      $bgCase = $request->input('bgCase');
      $bgId   = $request->input('bgId');
      $idName = ($bgCase == "characters" ? "cha_id" : "id")

      $bgInfo = DB::table($bgCase)->where($idName,"=",$bgId)->get();

      return "asd";
    }

}
