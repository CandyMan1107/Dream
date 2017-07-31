<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Member extends Model
{
    public function dataBringAll(){
        // maps 전체 data 가져오기
        $dataSet = DB::table('user')->get();
        // var_dump($dataSet);

        return $dataSet;
    }
}
