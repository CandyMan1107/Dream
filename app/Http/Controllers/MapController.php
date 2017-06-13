<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Map;
use File;

class MapController extends Controller
{
    
    // //지도 이미지 업로드
    public function MapImgStore(Request $request) {
        $file = $request->file('imgFile');
        $destinationPath = 'img/background/mapImg';
        $fileName = date("Y").date("m").date("d").date("s").$file->getClientOriginalName();
        $file->move($destinationPath, $fileName);

        DB::table("maps")->insert([
            "id" => 1,     // 유저 아이디는 임의값
            "img_src" => $fileName
        ]);

        return $fileName;
    }
}
