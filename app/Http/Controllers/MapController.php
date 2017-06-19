<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use File;
use App\Map;

class MapController extends Controller
{
    public function index() {
        $imgRoot = "img/background/mapImg";
        $img_src = DB::select("select * from map_images");

        $data = array();

        foreach ($img_src as $datas) {
            $d_arr = [
                "id"        => $datas->id,
                "img_src"   => $imgRoot."/".$datas->img_src
            ];
            array_push($data, $d_arr);
        }

        return view('background.map.map_view')->with("data", $data);
    }

    // 맵 목록
    public function mapList() {
        $data = array();
        $map_src = DB::select("select * from maps");

        foreach ($map_src as $datas) {
            $d_arr = [
                "id"        => $datas->id
            ];
            array_push($data, $d_arr);
        }

        return view('background.map.map_view')->with("data", $data);
    }



    //지도 이미지 업로드
    public function mapImgStore(Request $request) {
        $file = $request->file('imgFile');
        $destinationPath = 'img/background/mapImg';
        $fileName = date("Y").date("m").date("d").date("s").$file->getClientOriginalName();
        $file->move($destinationPath, $fileName);

        DB::table("map_images")->insert([
            // "id" => 1,     // 유저 아이디는 임의값
            "user_id" => 1,
            "img_src" => $fileName
        ]);
        $imgId = DB::table("map_images")->select("id")->where("user_id","=",1)->orderBy('id', 'DESC')->first();
        $data = [
          "imgId" => $imgId->id,
          "imgPath" => $destinationPath."/".$fileName
        ];

        return $data;
    }

    //지도 이미지 호출
    public function getImgCellList(Request $request){
      $userId = $request->input('userId');
      $data = DB::table("map_images")->select("id","img_src")->where("user_id","=",$userId)->get();
      return $data;
    }

    //저장된 이미지 삭제
    public function removeImg(Request $request){
        $imgId = $request->input('imgId');
        $destinationPath = '/img/background/mapImg';
        $removeFile = DB::table("map_images")->select("img_src")->where('id','=',$imgId)->get();
        $removeFile = $removeFile[0]->img_src;

        DB::table("map_images")->where('id','=',$imgId)->delete();
        File::delete(public_path().$destinationPath.$removeFile);

        return $removeFile;
    }
}
