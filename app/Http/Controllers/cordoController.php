<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class cordoController extends Controller
{
  public function getNovelInfo(Request $request){
    $tasks = DB::table("novels")->get();
    return $tasks;
  }

  public function getTodayBestNovelInfo(Request $request){
    $tasks = DB::table("novels")->select()->get();
    return $tasks;
  }

  public function getFantasyBestNovelInfo(Request $request){
    $tasks = DB::table("novels")->select()->where('genre','=','fantasy')->get();
    return $tasks;
  }

  public function getRomanceBestNovelInfo(Request $request){
    $tasks = DB::table("novels")->select()->where('genre','=','romance')->get();
    return $tasks;
  }
  public function getMondayNovelInfo(Request $request){
    $tasks = DB::table("novels")->select()->where('publish_case','=','day-publish')->where('period','like','%mon%')->get();
    return $tasks;
  }
  public function getTuesdayNovelInfo(Request $request){
    $tasks = DB::table("novels")->select()->where('publish_case','=','day-publish')->where('period','like','%tue%')->get();
    return $tasks;
  }
  public function getWednesdayNovelInfo(Request $request){
    $tasks = DB::table("novels")->select()->where('publish_case','=','day-publish')->where('period','like','%wed%')->get();
    return $tasks;
  }
  public function getThursdayNovelInfo(Request $request){
    $tasks = DB::table("novels")->select()->where('publish_case','=','day-publish')->where('period','like','%thr%')->get();
    return $tasks;
  }
  public function getFridayNovelInfo(Request $request){
    $tasks = DB::table("novels")->select()->where('publish_case','=','day-publish')->where('period','like','%fri%')->get();
    return $tasks;
  }
  public function getSaturdayNovelInfo(Request $request){
    $tasks = DB::table("novels")->select()->where('publish_case','=','day-publish')->where('period','like','%sat%')->get();
    return $tasks;
  }
  public function getSundayNovelInfo(Request $request){
    $tasks = DB::table("novels")->select()->where('publish_case','=','day-publish')->where('period','like','%sun%')->get();
    return $tasks;
  }

  public function getNovelFromSearch(Request $request){
    $searchContent = $request->input('searchContent');
    //$task = DB::table("novels")->where('title','like','%'$searchContent'%')->get();
    $novelInfo = DB::table("novels")
    ->select("novel_writers.novel_id", "title", "summary_intro","cover_img_src","genre","name")
    ->join("novel_writers","novels.id", "=", "novel_writers.novel_id")
    ->join("users","novel_writers.user_id", "=", "users.id")
    //->where("novels.title","like","%무%")->get();
    ->where("novels.title","like","%".$searchContent."%")->get();
    return $novelInfo;
  }
  public function getNovelById(Request $request){
    $id = $request->input('id');
    $task = DB::table("novels")->where('id','=',$id)->get();
    return $task;
  }
  public function getNovelEpisodeById(Request $request){
    $id = $request->input('id');
    $task = DB::table("novel_episodes")->where('id','=',$id)->get();
    return $task;
  }
  public function getNovelEpisodes(Request $request){
    $id = $request->input('id');
    $task = DB::table("novel_episodes")->where('belong_to_novel','=',$id)->get();
    return $task;
  }
  public function getNovelNotices(Request $request){
    $id = $request->input('id');
    $task = DB::table("novel_episodes")->where('belong_to_novel','=',$id)->where('is_notice','=','1')->get();
    return $task;
  }
}
