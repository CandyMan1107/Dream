<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Effect extends Model
{
    public function insert_effect($table_id, $data){
        $dataSet = [];
        // 등장인물 데이터 insert
        for( $i = 0 ;  count($data['characters']['content']) > $i ; $i++){
            
        }
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
