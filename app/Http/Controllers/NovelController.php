<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Novel;
use App\Episode;
use App\Background;

class NovelController extends Controller
{
    // NOVEL INFO
    public function novelInfo($id) 
    {
        // echo $id;

        $novelTable = new Novel();
        $novelData = $novelTable->dataJoinEpisode($id);

        $data = array();

        for($i = 0; $i < count($novelData); $i++) {
            $datas = [
                'novelId' => $novelData[$i]->id,
                'episode_count' => $i+1,
                'title' => $novelData[$i]->title,
                'intro' => $novelData[$i]->intro,
                'summary_intro' => $novelData[$i]->summary_intro,
                'cover_img_src' => $novelData[$i]->cover_img_src,
                'episode_cover_src' => $novelData[$i]->episode_cover_src,
                'publish_case' => $novelData[$i]->publish_case,
                'period' => $novelData[$i]->period,
                'genre' => $novelData[$i]->genre,
                'belong_to_novel' => $novelData[$i]->belong_to_novel,
                'episode_title' => $novelData[$i]->episode_title,
                'created_at' => $novelData[$i]->created_at
            ];
            
            array_push($data, $datas);
        }
        
        // var_dump($novelData);

        // echo $data[$i]['title'];

        return view('novel.info.novel_info')->with("data", $data);
    }

    // NOVEL EPISODE
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

        // var_dump($data);

        // echo($episodeCount);
        // var_dump($data[$i]);

        return view('novel.read.novel_read_view')->with("data", $data[$i]);
    }

    // NOVEL BACKGROUND : CHARACTER
    public static function backgroundCharacter($id) {
        // echo $id;

        $novelId = $id;

        $backgroundTable = new Background();
        $characterData = $backgroundTable->selectCharacter($novelId);
        
        // var_dump($characterData);

        $data = array(array());

        $i = 0;

        foreach ($characterData as $datas) {
            $data[$i]['id'] = $datas->cha_id;
            $data[$i]['name'] = $datas->name;
            $data[$i]['info'] = $datas->info;
            $data[$i]['age'] = $datas->age;
            $data[$i]['gender'] = $datas->gender;
            $data[$i]['refer_info'] = $datas->name;
            $data[$i]['img_src'] = $datas->img_src;

            $i++;
        }

        // var_dump($data);
        
        return view('novel.read.background.character')->with("data", $data);
    }

    // VIEWER QUICK MENU
    public static function quickMenu($data) {
        $novelId = $data['belong_to_novel'];

        $episodeTable = new Episode();
        $episodeData = $episodeTable->episodeTitle($novelId);

        // var_dump($episodeData);

        // $episodeCount = count($episodeData);
        // echo $episodeCount;

        $i = 0;

        foreach ($episodeData as $datas) {
            $dataE[$i]['novel_id'] = $novelId;
            $dataE[$i]['episode_title'] = $datas->episode_title;

            $i++;
        }

        // var_dump($dataE);

        return view('novel.read.quick_menu')->with("dataE", $dataE);
    }

    public static function viewerModal() {
        return view('novel.read.viewer_modal');
    }

    public static function backgroundModal($id) {
        return view('novel.read.background_modal')->with("id", $id);
    }
}
