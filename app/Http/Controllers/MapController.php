<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use DB;
use App\Map;

class MapController extends Controller
{
    
    //지도 이미지 메인
    public function map_img_store(Request $request) {
        $MapimgUpLoad = new MapController();
        $file = Input::file('map_img_upload');
        $data = $request->all();

        if($file){
            $map_img_name = $imgUpLoad->backgroundImgUpload($file);
        }
        else {
            $map_img_name = null;
        }
        
        $map->insert_map($data,$img_name);
        return redirect(route('map.index'));
    }

    //지도 이미지 업로드
    public function MapImgUpload($file) {
        $destinationPath = 'img/background/mapImg';
        $fileName = date("Y").date("m").date("d").date("s").$file->getClientOriginalName();
        $file->move($destinationPath, $fileName);

        return $fileName;
    }
}
