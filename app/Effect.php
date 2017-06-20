<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Effect extends Model
{
    public function insert_effect($table, $data){
        $dataSet = [];
        $dataSet = [
            'name' => $item_info['item_name'],
            'info' => $item_info['item_content'],
            'category' => $item_info['item_cate'],
            'refer_info' => $item_info['refer_info'],
            'img_src' => $img_src,
        ];
        // data insert
        DB::table('items')->insert($dataSet);
    }
}
