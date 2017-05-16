<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class UpImgController extends Controller
{
    // 팝업 윈도우를 대상으로 하는 이미지 업로드 창 팝업
    public function popUploadImgWindow(){
      $tasks = [];
      return view('pops/upload_image')->with('tasks',$tasks);
    }

    public function showUploadFile(Request $request) {
     $file = $request->file('image') ;

     //Display File Name
     echo 'File Name: '.$file->getClientOriginalName() ;
     echo '<br>';

     //Display File Extension
     echo 'File Extension: '.$file->getClientOriginalExtension() ;
     echo '<br>';

     //Display File Real Path
     echo 'File Real Path: '.$file->getRealPath() ;
     echo '<br>';

     //Display File Size
     echo 'File Size: '.$file->getSize() ;
     echo '<br>';

     //Display File Mime Type
     echo 'File Mime Type: '.$file->getMimeType() ;

     //Move Uploaded File
     //$destinationPath = 'uploads';
     //$file->move($destinationPath,$file->getClientOriginalName() );
  }
}
