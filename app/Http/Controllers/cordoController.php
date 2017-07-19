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
  //로그인 하기
  public function login(Request $request){
    $user_id = $request->input('id');
    $password = $request->input('pw');
    $task = DB::table("users")->where('user_id','=',$user_id)->where('password','=', $password)->get()->count();
      return $task;
  }
  //아이디 중복체크
  public function idCheck(Request $request){
    $user_id = $request->input('id');
    $task = DB::table("users")->where('user_id', '=', $user_id)->get()->count();
    return $task;
  }
  //아이디 찾기
  public function idSearch(Request $request){
    $emailInfo = $request->input('email');
    $task = DB::table('users')->select('user_id')->where('email','=',$emailInfo)->get();
    return $task;
  }
  //비밀번호 찾기
  public function pwSearch(Request $request){
    $user_id = $request->input('id');
    $emailInfo = $request->input('email');
    $task = DB::table('users')->select('password')->where('user_id', '=', $user_id)->where('email','=',$emailInfo)->get();
    return $task;
  }
  //회원 정보 입력
  public function insertUserInfo(Request $request){
      $id = $request->input('user_id');
      $nick = $request->input('nickname');
      $email = $request->input('email');
      $pw = $request->input('user_pw');
      DB::table('users')->insert([
        "user_id" => $id,
        "name" => $nick,
        "email" => $email,
        "password" => $pw
      ]);
    }

  //캐릭터 목록 가져오기
  public function getCharacters(Request $request){
    $tasks = DB::table("characters")->get();
    return $tasks;
  }

  //해당 소설을 작성한 작가 아이디 가져오기
  public function getUserIdOfNovel(Request $request){
    $novel_id = $request->input('id');
    $task = DB::table('novel_writers')->select('user_id')->where('novel_id', '=', $novel_id)->get();
    return $task;
  }

  //유저 정보 가져오기
  public function getUserInfo(Request $request){
    $user_id = $request->input('id');
    $task = DB::table('users')->select()->where('user_id', '=', $user_id)->get();
    return $task;
  }

  public function getBackgroundSettingsHistoryGraph(Request $request){
    $backgroundData = DB::table('timetables')->get();
    $data = array(array());

    $i = 0;
    foreach ($backgroundData as $datas){
        $data[$i]['id'] = $datas->id;
        $data[$i]['event_name'] = $datas->event_names;
        $data[$i]['event_content'] = $datas->event_contents;
        $data[$i]['start_day'] = $datas->start_days;
        $data[$i]['end_day'] = $datas->end_days;
        $data[$i]['other'] = $datas->others;
        $data[$i]['refer_info'] = $datas->refer_info;
        $data[$i]['refer_info'] = explode('^',$data[$i]['refer_info']);

        $i++;
    }

    return $data;
  }

  public function getBackgroundSettingsHistoryCharacters(Request $request){
    $backgroundData = DB::table('characters')->get();
    $data = array(array());

    $i = 0;
    foreach ($backgroundData as $datas){
        $data[$i]['id'] = $datas->cha_id;
        $data[$i]['name'] = $datas->name;
        $data[$i]['img_src'] = $datas->img_src;

        $i++;
    }
    return $data;
  }

  public function getBackgroundSettingsHistoryItems(Request $request){
    $backgroundData = DB::table('items')->get();
    $data = array(array());

    $i = 0;
    foreach ($backgroundData as $datas){
        $data[$i]['id'] = $datas->id;
        $data[$i]['name'] = $datas->name;
        $data[$i]['img_src'] = $datas->img_src;

        $i++;
    }
    return $data;
  }

  public function getBackgroundSettingsHistoryMaps(Request $request){
    $backgroundData = DB::table('maps')->get();
    $data = array(array());

    $i = 0;
    foreach ($backgroundData as $datas){
        $data[$i]['id'] = $datas->id;
        $data[$i]['name'] = $datas->title;
        $data[$i]['img_src'] = $datas->cover_src;

        $i++;
    }
    return $data;
  }

  public function getBackgroundSettingsCharacters(Request $request){
    $backgroundData = DB::table('characters')->get();
    $data = array(array());

    $i = 0;
    foreach ($backgroundData as $datas){
      $data[$i]['id'] = $datas->cha_id;
      $data[$i]['name'] = $datas->name;
      $data[$i]['info'] = $datas->info;
      $data[$i]['age'] = $datas->age;
      $data[$i]['gender'] = $datas->gender;
      $data[$i]['refer_info'] = $datas->name;
      $data[$i]['img_src'] = $datas->img_src;

        $i++;
    }
    return $data;
  }
  //캐릭터 정보 가져오기
//   public function getCharactersInfo(){
//     $id = $request->input('id');
//     $task = DB::table("characters")->where('id','=',$id)->get();
//     return $task;
//   }
}
