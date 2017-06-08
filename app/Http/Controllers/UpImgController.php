<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Storage;
use DB;

class UpImgController extends Controller
{
    // File 형식으로 받음 이미지 업로드
    public function uploadImg(Request $request){
      $file = $request->file('imgFile') ;
      $destinationPath = 'upload/images';
      $fileName = date("Y").date("m").date("d").date("s").$file->getClientOriginalName();
      $file->move($destinationPath, $fileName);

      DB::table("cover_images")->insert([
        "user_id" => 1,     // 유저 아이디는 임의값
        "cover_img_src" => $fileName
      ]);

      return $fileName;
    }

}
