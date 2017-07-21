<?php

namespace App\Http\Controllers;

use App\Novel;
use App\Novel_chapter;
use App\Episode;
use App\Novel_has_chapter;
use App\Chapter_has_episode;

use Illuminate\Http\Request;

class ChaptersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('background.chapter.chapter_main');
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
        $data = $request->all();
        // var_dump($data['novel_id']);
        $chapter = new Novel_chapter();
        $novel_has_chapter = new Novel_has_chapter();

        // $chapter_id = $chapter->new_chater($data);
        // $novel_has_chapter->add_chapter($data['novel_id'],$chapter_id);

        $redirect_url = 'chapter/'.$data['novel_id'];

        return redirect($redirect_url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($novel_id)
    {
        $chapters_controller = new ChaptersController();
        $novel = new Novel();
        $episode = new Episode();
        $novel_has_chapter = new Novel_has_chapter();
        $chapter_has_episode = new Chapter_has_episode();    

        $novel_data = $novel->basicData($novel_id);
        $novel_relation = $novel_has_chapter->get_data($novel_id);
        
    
            
        
        
        $data = $chapters_controller->novel_data_array($novel_data,$novel_relation);

        // var_dump($chapter_data);
        // echo($data['novel_title']);
        return view('background.chapter.chapter_main')->with("data",$data);
    }

    private function novel_data_array($novel_data,$novel_relation){
        $data = array(array(array()));
        $novel_chapter = new Novel_chapter();

        // novel data make array
        $data['novel']['id'] = $novel_data[0]->id;
        $data['novel']['title'] = $novel_data[0]->title;
        $data['novel']['intro'] = $novel_data[0]->intro;
        $data['novel']['summary_intro'] = $novel_data[0]->summary_intro;
        $data['novel']['cover_img_src'] = $novel_data[0]->cover_img_src;
        $data['novel']['publish_case'] = $novel_data[0]->publish_case;
        $data['novel']['genre'] = $novel_data[0]->genre;
        $data['novel']['created_at'] = $novel_data[0]->created_at;
        $data['novel']['updated_at'] = $novel_data[0]->updated_at;
        // echo $data['novel']['id'];
        // chapter data make array
        $i = 0;
        foreach($novel_relation as $datas){
            $chapter_data = $novel_chapter->get_data($datas->chapter_id);
            // var_dump($chapter_data);
            $data['chapter'][$i]['chapter_id'] = $datas->chapter_id;
            $data['chapter'][$i]['chapter_name'] = $chapter_data[0]->chapter_name;
            $data['chapter'][$i]['chapter_content'] = $chapter_data[0]->chapter_content;
            $i++;
        }
        // chapter data make array
        
        // chapter realtion data make array

        // episode data make array


        return $data;
    }

    public static function chapter_modal(){
        return view('background.chapter.chapter_modal');
    }

    public function get_episode($id){
        echo($id);
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
}
