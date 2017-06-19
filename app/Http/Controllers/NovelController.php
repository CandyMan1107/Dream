<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Novel;
use App\Episode;

class NovelController extends Controller
{
    //
    public function novelInfo($id) 
    {
        // echo $id;

        $novelTable = new Novel();
        $novelData = $novelTable->dataJoinEpisode($id);

        $data = array();

        if ($novelData) {
            for($i = 0; $i < count($novelData); $i++){
                $datas = [
                    'title' => $novelData[$i]->title,
                    'intro' => $novelData[$i]->intro,
                    'summary_intro' => $novelData[$i]->summary_intro,
                    'cover_img_src' => $novelData[$i]->cover_img_src,
                    'publish_case' => $novelData[$i]->publish_case,
                    'period' => $novelData[$i]->period,
                    'genre' => $novelData[$i]->genre,
                    'belong_to_novel' => $novelData[$i]->belong_to_novel,
                    'episode_title' => $novelData[$i]->episode_title,
                    'created_at' => $novelData[$i]->created_at,
                    'episode_count' => $i+1
                ];

                array_push($data, $datas);
            }
        } else {
            for($i = 0; $i < count($novelData); $i++){
                $datas = [
                    'title' => "",
                    'intro' => "",
                    'summary_intro' => "",
                    'cover_img_src' => "",
                    'publish_case' => "",
                    'period' => "",
                    'genre' => "",
                    'belong_to_novel' => "",
                    'episode_title' => "",
                    'created_at' => "",
                    'episode_count' => ""
                ];

                array_push($data, $datas);
            }
        }

        // var_dump($novelData);

        // return var_dump($data);

        //echo $data[$i]['title'];

        return view('novel.info.novel_info')->with("data", $data);
    }

    public static function episodeShow($id) 
    {
        $string = explode("&", $id);
        // var_dump($string);

        $novelId = $string[0];
        $episodeCount = $string[1];

        // echo($novelId);
        // echo($episodeCount);

        $episodeTable = new Episode();
        $episodeData = $episodeTable->dataJoinNovel($novelId);

        // var_dump($episodeData);

        $data = array(array());
        $i = 0;

        if ($episodeData) {
            foreach($episodeData as $datas) {
                $data[$i]['episode_count'] = $episodeCount;

                $data[$i]['belong_to_novel'] = $datas->belong_to_novel;
                $data[$i]['is_charge'] = $datas->is_charge;
                $data[$i]['is_notice'] = $datas->is_notice;
                $data[$i]['cover_img_src'] = $datas->cover_img_src;
                $data[$i]['episode_title'] = $datas->episode_title;
                $data[$i]['episode'] = $datas->episode;
                $data[$i]['writers_postscript'] = $datas->writers_postscript;
                $data[$i]['char_count'] = $datas->char_count;
                $data[$i]['created_at'] = $datas->created_at;

                $data[$i]['novel_title'] = $datas->title;

                if ($i == $episodeCount - 1) {
                    $i = $episodeCount - 1;

                    break;
                }

                $i++;
            }
        } else {
                $data[$i]['episode_count'] = "";

                $data[$i]['belong_to_novel'] = "";
                $data[$i]['is_charge'] = "";
                $data[$i]['is_notice'] = "";
                $data[$i]['cover_img_src'] = "";
                $data[$i]['episode_title'] = "";
                $data[$i]['episode'] = "";
                $data[$i]['writers_postscript'] = "";
                $data[$i]['char_count'] = "";
                $data[$i]['created_at'] = "";

                $data[$i]['novel_title'] = "";
        }

        // var_dump($episodeData);

        // echo($episodeCount);
        // var_dump($data[$i]);

        return view('novel.read.novel_read_view')->with("data", $data[$i]);
    }

    public static function quickMenu($data) {
        $novelId = $data['belong_to_novel'];

        $episodeTable = new Episode();
        $episodeData = $episodeTable->episodeTitle($novelId);

        // var_dump($episodeData);

        // $episodeCount = count($episodeData);
        // echo $episodeCount;

        $i = 0;

        if ($episodeData) {
            foreach ($episodeData as $datas) {
                $dataE[$i]['novel_id'] = $novelId;
                $dataE[$i]['episode_title'] = $datas->episode_title;

                $i++;
            }
        } else {
            $dataE[$i]['novel_id'] = "";
            $dataE[$i]['episode_title'] = "";
        }

        // var_dump($dataE);

        return view('novel.read.quick_menu')->with("dataE", $dataE);
    }

    public static function viewerModal() {
        return view('novel.read.viewer_modal');
    }

    public static function backgroundModal($data) {
        return view('novel.read.background_modal')->with("data", $data);
    }
}
