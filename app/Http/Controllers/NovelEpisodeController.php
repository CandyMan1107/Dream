<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Novel;
use App\Episode;

class NovelEpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $novelTable = new Novel();
        $novelData = $novelTable->dataSelectAll();

        $episodeTable = new Episode();
        $episodeData = $episodeTable->selectWithNovel();
        // $episodeData = DB::table("novel_episodes")->select("belong_to_novel", "episode_title", "created_at")->get();
        
        $epiData[] = [];
        $data[] = [];

        $e = 0;

        $i = 0;     
        $num = 0;

        // var_dump($episodeData);

        foreach($episodeData as $episodes) {
            $epiData[$e]['belong_to_novel'] = $episodes->belong_to_novel;
            $epiData[$e]['episode_title'] = $episodes->episode_title;
            $epiData[$e]['created_at'] = $episodes->created_at;

            $e++;
        }

        foreach($novelData as $datas) {
            $data[$i]['id'] = $datas->id;
            $data[$i]['title'] = $datas->title;
            $data[$i]['intro'] = $datas->intro;
            $data[$i]['summary_intro'] = $datas->summary_intro;
            $data[$i]['cover_img_src'] = $datas->cover_img_src;
            $data[$i]['publish_case'] = $datas->publish_case;
            $data[$i]['period'] = $datas->period;
            $data[$i]['genre'] = $datas->genre;

            if ($epiData[$i]['belong_to_novel'] == $data[$i]['id']) {
                $num = $i;

                $data[$num]['episode_title'] = $epiData[$num]['episode_title'];
                $data[$num]['created_at'] = $epiData[$num]['created_at'];

                break;
            }

            $i++;
        }

        // echo ($data[0]['id']);

        return view('novel.novel_info')->with("data", $data[$num]);
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
        //
        // $table = $request->all();

        // $episodeTable = new Episode();

        // $episodeTable->insert_table($table);
        // // var_dump($table);

        // return redirect(route('novel_read_view.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function show($id)
    {
        //
        $string = explode("&", $id);
        // var_dump($string);

        $novelTable = new Novel();
        $novelData = $novelTable->dataSelectAll();

        $episodeTable = new Episode();
        $episodeData = $episodeTable->dataSelectAll();

        // var_dump($episodeData);

        // $data = array(array());
        $data[] = [];
        $i = 0;     
        $num = 0;

        foreach($episodeData as $datas) {
            $data[$i]['id'] = $datas->id;
            $data[$i]['belong_to_novel'] = $datas->belong_to_novel;
            $data[$i]['is_charge'] = $datas->is_charge;
            $data[$i]['is_notice'] = $datas->is_notice;
            $data[$i]['cover_img_src'] = $datas->cover_img_src;
            $data[$i]['episode_title'] = $datas->episode_title;
            $data[$i]['episode'] = $datas->episode;
            $data[$i]['writers_postscript'] = $datas->writers_postscript;
            $data[$i]['char_count'] = $datas->char_count;
            $data[$i]['created_at'] = $datas->created_at;

            if ($string[0] == $data[$i]['belong_to_novel']) {
                $num = $i;

                break;
            }

            $i++;
        }

        return view('novel.read.novel_read_view')->with("data", $data[$num]);

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
