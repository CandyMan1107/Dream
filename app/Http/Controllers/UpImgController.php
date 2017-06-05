<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
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
      $copyDiv = Input::get('copyDiv');

      $tasks = [
        "copyDiv"     => $copyDiv,
        "saveDi0r"     => $destinationPath,
        "fileName"    => $file->getClientOriginalName(),
        "inputClass"  => "image_cell"              // 해당 클래스에 태그 추가
      ];

      return view('pops/display_image')->with('tasks', $tasks);


    }
}
