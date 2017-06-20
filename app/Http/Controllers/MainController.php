<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Novel;

class MainController extends Controller
{
    //

    public function index() {

        $novelTable = new Novel();
        $novelData = $novelTable->mainData();

        $data[] = [];
        $i = 0;

        if (!empty($novelData)) {
            foreach($novelData as $datas) {
                $data[$i]['id'] = $datas->id;
                $data[$i]['title'] = $datas->title;
                $data[$i]['intro'] = $datas->intro;
                $data[$i]['summary_intro'] = $datas->summary_intro;
                $data[$i]['cover_img_src'] = $datas->cover_img_src;
                $data[$i]['publish_case'] = $datas->publish_case;
                // $data[$i]['period'] = $datas->period;
                $data[$i]['genre'] = $datas->genre;

                $i++;
            }
        } else {
            $data['null'] = "";
        }

        // var_dump($data);

        // if (empty($data['null'])) {
        //     echo "YES IT IS EMPTY!";
        // }

        
        return view('welcome')->with('data', $data);
    }

    public static function todayNovelView($data) {
        return view('novel.welcome.todayMin')->with('data', $data);
    }

    public static function bestNovelView($data) {
        return view('novel.welcome.bestMin')->with('data', $data);
    }

    public function todayNovelShow () {
        $novelTable = new Novel();
        $novelData = $novelTable->mainData();

        $data[] = [];
        $i = 0;

        $currentDate = date('Y-m-d H:i:s');
        // echo $dt;

        foreach($novelData as $datas) {
            $data[$i]['id'] = $datas->id;
            $data[$i]['title'] = $datas->title;
            $data[$i]['intro'] = $datas->intro;
            $data[$i]['summary_intro'] = $datas->summary_intro;
            $data[$i]['cover_img_src'] = $datas->cover_img_src;
            $data[$i]['publish_case'] = $datas->publish_case;

            $data[$i]['currentDate'] = $currentDate;

            $data[$i]['period'] = $datas->period;
            
            if ($data[$i]['period']) {
                $data[$i]['string']  = explode('/', $data[$i]['period']);
                $data[$i]['periodStr'] = array_slice($data[$i]['string'], 1);
            }

            $data[$i]['genre'] = $datas->genre;

            $i++;
        }

        // print_r($data[0]['periodStr']);
        // var_dump($data);

        return view('novel.kind.today_novel_by_day')->with('data', $data);
    }
}
