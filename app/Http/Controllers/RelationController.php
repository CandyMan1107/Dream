<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Input;

class RelationController extends Controller
{
  public function index(){
    $imgRoot = "img/background/characterImg/";
    $chaInfos = DB::select("select * from characters");
    $relInfos = DB::select("select * from relations");
    $tasks = array(
      "imgRoot"   => $imgRoot,
      "chaInfos"  => $chaInfos,
      "relInfos"  => $relInfos
    );
    return view('background.relationship.relationship_view')->with('tasks', $tasks);
  }

  // 관계 번호를 입력받아 삭제
  public function removeRelation(Request $request){
    $relnum = $request->input('relnum');
    DB::table("relations")->where('relnum','=',$relnum)->delete();
    return "success";
  }

  // 관계 정보를 입력받아 생성
  public function createRelation(Request $request){
    $relnum = $request->input('relnum');
    $sourceId = $request->input('sourceId');
    $targetId = $request->input('targetId');
    $relationship = $request->input('relationship');

    $test1 = "relnum : ".$relnum;
    $test2 = " sourceId : ".$sourceId;
    $test3 = " targetId : ".$targetId;
    $test4 = " relationship : ".$relationship;

    DB::table("relations")->insert([
      //"relnum" => $relnum,
      "target" => (int)$targetId,
      "source" => (int)$sourceId,
      "relationship" => $relationship
    ]);

    echo $test1.$test2.$test3.$test4;
  }
}
