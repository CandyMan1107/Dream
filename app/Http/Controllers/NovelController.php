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
        $novelTable = new Novel();
        $novelData = $novelTable->dataSelectAll();

        $episodeTable = new Episode();
        $episodeData = $episodeTable->selectWithNovel();
        
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

    public static function episodeShow($id) 
    {
        $string = explode("&", $id);
        // var_dump($string);

        $novelTable = new Novel();
        $novelData = $novelTable->titleSelect();

        $episodeTable = new Episode();
        $episodeData = $episodeTable->dataSelectAll();

        // var_dump($episodeData);

        // $data = array(array());
        $novelD[] = [];
        $data[] = [];
        $n = 0;
        $i = 0;     
        $num = 0;

        foreach($novelData as $novels) {
            $novelD[$n]['id'] = $novels->id;
            $novelD[$n]['title'] = $novels->title;

            $n++;
        }

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

                if($string[0] == $novelD[$num]['id']) {
                    $data[$num]['title'] = $novelD[$num]['title'];
                }

                break;
            }

            $i++;
        }

        return view('novel.read.novel_read_view')->with("data", $data[$num]);
    }
}
