<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Storage;

class UpImgController extends Controller
{
    // 팝업 윈도우를 대상으로 하는 이미지 업로드 창 팝업
    public function popUploadImgWindow($copyDiv){
      return view('pops/upload_image')->with('copyDiv',$copyDiv);
    }

    public function showUploadFile(Request $request) {
      //파일 이동
      $file = $request->file('image') ;
      $destinationPath = 'upload/images';
      $file->move($destinationPath,$file->getClientOriginalName() );

    }
}
