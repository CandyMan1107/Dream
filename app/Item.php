<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    public function insert_item($item_info, $img_src){
        $dataSet = [];
        $dataSet = [
            'name' => $item_info['item_name'],
            'info' => $item_info['item_content'],
            'category' => $item_info['item_cate'],
            'refer_info' => $item_info['item_refer_info'],
            'img_src' => $img_src,
        ];
        // data insert
        DB::table('items')->insert($dataSet);
        // var_dump($table);
    }

    public function dataBringAll(){
        // items 전체 data 가져오기
        $dataSet = DB::table('items')->get();
        // var_dump($dataSet);

        return $dataSet;
    }

    public function itemListBringAll(){
        $dataSet = DB::table('items')->select('id','name','img_src')->get();

        return $dataSet;
    }

    public function get_item_src($item_id){
        $item_src = DB::table('items')->select('img_src')->where('id',$item_id)->get();

        return $item_src;
    }
}
