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

  // 관계 등록
  public function relationStore(Request $request){
    // 맵 , 그리드, 텍스트 정보
    $title = $request->input('title');

    // 이미지 커버 저장
    $canvasUrl = $request->input('canvasUrl');


    $destinationPath = 'img/background/relationImg/';
    if(!is_dir($destinationPath)){
      mkdir($destinationPath);
    }
    $fileName = date("Y").date("m").date("d").date("s")."_".$title.".png";
    $outputFile = $destinationPath.$fileName;
    $ifp = fopen( $outputFile, 'wb' );

    $data = explode( ',', $canvasUrl);
    fwrite( $ifp, base64_decode( $data[ 1 ] ) );
    fclose( $ifp );

    // 맵 데이터 추가
    $mytime = date('Y-m-d H:i:s');
    DB::table("relation_lists")->insert([
        "cover_src"  => $fileName,
        "title"      => $title,
        "created_at" => $mytime
    ]);

    // 등록한 맵 아이디 호출
    $relListInfo = DB::table("relation_lists")->select("id","created_at","updated_at")->orderBy('id', 'DESC')->first();
    $listId = $relListInfo->id;
    $createdAt = $relListInfo->created_at;
    $updatedAt = $relListInfo->updated_at;

    // // 그리드 테이블 등록
    // foreach($gridInfos as $gridInfo){
    //   DB::table("grids")->insert([
    //       "belong_to_map"  => $mapsId,
    //       "grid_id"        => $gridInfo->grid_id,
    //       "fill_info"      => $gridInfo->fill_info
    //   ]);
    // }

    // // 텍스트 테이블 등록
    // foreach($textInfos as $textInfo){
    //   DB::table("map_texts")->insert([
    //       "belong_to_map"  => $mapsId,
    //       "text_id"        => $textInfo->text_id,
    //       "content"        => $textInfo->content,
    //       "font_family"    => $textInfo->font_family,
    //       "font_size"      => $textInfo->font_size,
    //       "letter-spacing" => $textInfo->letter_spacing,
    //       "fill_color"     => $textInfo->fill_color
    //   ]);
    // }

    return $listId."/".$createdAt;
  }
}
