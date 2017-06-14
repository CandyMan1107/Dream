<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Novel;
use App\Episode;

class EpisodeController extends Controller
{
    //
    public function novelInfo($novelId) {
        $string = explode("&", $id);
        
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
}
