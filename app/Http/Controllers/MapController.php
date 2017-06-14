<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Map;
use File;

class MapController extends Controller
{
    public function index() {
        $imgRoot = "img/background/mapImg/";
        $img_src = DB::select("select * from maps");
        $tasks = array(
            "id"   => $imgRoot
            // "img_src"  => $img_src["img_src"]
        );
        
        return view('background.map.map_view')->with('tasks', $tasks);
    }


    //지도 이미지 업로드
    public function MapImgStore(Request $request) {
        $data = array(array());
        $file = $request->file('imgFile');
        $destinationPath = 'img/background/mapImg';
        $fileName = date("Y").date("m").date("d").date("s").$file->getClientOriginalName();
        $file->move($destinationPath, $fileName);

        DB::table("maps")->insert([
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
