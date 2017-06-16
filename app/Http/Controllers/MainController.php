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

        // var_dump($data);

        return view('welcome')->with('data', $data);
    }
}
