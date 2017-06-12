<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Character;

class BackgroundCharactersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $character = new Character();
        $dataSet = $character->dataBringAll();
        $data = array(array());
        $i = 0;

        foreach($dataSet as $datas){
            $data[$i]['id'] = $datas->cha_id;
            $data[$i]['name'] = $datas->name;
            $data[$i]['info'] = $datas->info;
            $data[$i]['age'] = $datas->age;
            $data[$i]['gender'] = $datas->gender;
            $data[$i]['refer_info'] = $datas->refer_info;
            $data[$i]['img_src'] = $datas->img_src;    
            $i++;
        }

        return view('background.character.character_view')->with("data", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $character = new Character();

        $imgUpLoad = new BackgroundCharactersController();

        $file = Input::file('character_img_upload');
        $data = $request->all();

        if($file){
            $img_name = $imgUpLoad->backgroundImgUpload($file);
        }
        else {
            $img_name = null;
        }

        $character->insert_character($data,$img_name);

        return redirect(route('character.index'));
    }

    //소설 설정 이미지 업로드
    public function backgroundImgUpload($file){
        $destinationPath = 'img/background/characterImg';
        $fileName = date("Y").date("m").date("d").date("s").$file->getClientOriginalName();
        $file->move($destinationPath, $fileName);

        return $fileName;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showUploadFile(Request $request) {
    //   $file = $request->file('image') ;
      $file = Input::file('image');
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
      $destinationPath = 'uploads';
      $file->move($destinationPath,$file->getClientOriginalName() );
   }
}
