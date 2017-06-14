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
    public function MapImgStore(Request $request) {
        $data = array(array());
        $file = $request->file('imgFile');
        $destinationPath = 'img/background/mapImg';
        $fileName = date("Y").date("m").date("d").date("s").$file->getClientOriginalName();
        $file->move($destinationPath, $fileName);

        DB::table("map_images")->insert([
            // "id" => 1,     // 유저 아이디는 임의값
            "img_src" => $fileName
        ]);

        return $fileName;
    }

    // 저장된 이미지 삭제
    // public function removeImg(Request $request){
    //     $userId = $request->input('id');
    //     $removeFile = $request->input('removeFile');

    //     File::delete(public_path()."/upload/images/".$removeFile);
    //     DB::table("maps")->where('id','=',$userId)->where('cover_img_src','=',$removeFile)->delete();
    //     return $removeFile;
    // }
}
