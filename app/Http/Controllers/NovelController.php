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

        $episodeTable = new Episode();
        $episodeData = $episodeTable->selectWithNovel($id);

        $novelTable = new Novel();
        $novelData = $novelTable->dataIdSelect($id);

        // var_dump($episodeData);

        $data[] = [];
        $i = 0;

        foreach($novelData as $datas) {
            $data[$i]['title'] = $datas->title;
            $data[$i]['intro'] = $datas->intro;
            $data[$i]['summary_intro'] = $datas->summary_intro;
            $data[$i]['cover_img_src'] = $datas->cover_img_src;
            $data[$i]['publish_case'] = $datas->publish_case;
            $data[$i]['period'] = $datas->period;
            $data[$i]['genre'] = $datas->genre;

            $i++;
        }

        $i = 0;

        foreach($episodeData as $datas) {
            $data[$i]['belong_to_novel'] = $datas->belong_to_novel;
            $data[$i]['episode_title'] = $datas->episode_title;
            $data[$i]['created_at'] = $datas->created_at;

            $i++;
        }

        // var_dump($novelData);

        // var_dump($data);

        return view('novel.novel_info')->with("data", $data[$i]);
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

            if ($string[0] == $data[$i]['belong_to_novel'] && $data[$i]['belong_to_novel'] == $novelD[$num]['id']) {
                $num = $i;

                $data[$num]['title'] = $novelD[$num]['title'];

                break;
            }

            $i++;
        }

        return view('novel.read.novel_read_view')->with("data", $data[$num]);
    }
}
