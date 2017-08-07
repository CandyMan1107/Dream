<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\novel_has_open_background;
use App\Background;
use App\Character;
use App\Item;
use App\Timetable;
use App\Relation_list;
use App\Ownership;
use App\open_character;
use App\open_ownership;
use App\open_item;

class BackgroundShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_COOKIE['novel_id'])){
            $novel_id = $_COOKIE['novel_id'];
        }
        else{
            return redirect('write_novel/my_novel');
        }
        // var_dump($novel_id);
        //
        return view('background.share.set_share_view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    public function get_background($kind){
        $novel_has_open_background = new novel_has_open_background();
        $background = new Background;
        $open_character = new open_character();
        $open_ownership = new open_ownership();
        $novel_id = $_COOKIE['novel_id'];

        $set_open_background_id = array();
        $set_open_background_data = array(array());
        $none_open_background_data = array(array(array()));

        $i = 0;
        $j = 0;
        // 소설에 등록된 공개 설정 된 설정 id가져오기
        $set_open_background = $novel_has_open_background->get_background_id_by_novel_id($novel_id,$kind);
        
        if(isset($set_open_background[0])){
            
            foreach($set_open_background as $temp_set_open_background){
                if($temp_set_open_background->background_kind == "characters"){
                    $open_character_data = $open_character->get_open_charcter_with_ownership($temp_set_open_background->open_background_id);
                }
                
                // 기존 설정 notin 을 위한 배열
                $set_open_background_id[$i] = $temp_set_open_background->background_id;
                $i++;
                // 설정 되어 있는 설정을 불러오기 위한 처리 희망
            }
        }
        
        // 공개 되지 않은 data id 가져오기
        $none_open_background = $background->get_none_open_background($novel_id,$set_open_background_id,$kind);
        // var_dump($set_open_background);
        $i = 0;
        
        // character 일 경우
        if($kind == "characters") {
            $character = new Character();
            $ownership = new Ownership();
            foreach($none_open_background as $temp_none_open_background){
                // 공개 설정 되어 있지 않은 character data 가져오기
                $temp_none_open_background_data = $character->none_set_open_background($temp_none_open_background->background_id);
                // var_dump($temp_none_open_background_data);
                foreach($temp_none_open_background_data as $temp_data){
                    $none_open_background_data[$i]['id'] = $temp_data->cha_id;
                    $none_open_background_data[$i]['name'] = $temp_data->name;
                    $none_open_background_data[$i]['info'] = $temp_data->info;
                    $none_open_background_data[$i]['age'] = $temp_data->age;
                    $none_open_background_data[$i]['gender'] = $temp_data->gender;
                    $none_open_background_data[$i]['refer_info'] = $temp_data->refer_info;
                    $none_open_background_data[$i]['img_src'] = $temp_data->img_src;
                }

                // 소유 사물 id 가져오기
                $ownership_data = $ownership->get_ownership($none_open_background_data[$i]['id']);
                
                foreach($ownership_data as $temp_ownership_data) {
                    $item = new Item();

                    $item_id = array();
                    $item_id = explode("+",$temp_ownership_data->item_id);
                    
                    for($j = 0 ; $j < count($item_id) ; $j++ ){
                        // 소유 사물 img 주소 가져오기
                        $ownership_img_src = $item->get_item_src($item_id[$j]);
                        
                        foreach($ownership_img_src as $temp_ownership_img_src) {
                            $none_open_background_data[$i]['ownership_img_src'][$j] = $temp_ownership_img_src->img_src;
                            $none_open_background_data[$i]['ownership_id'][$j] = $temp_ownership_img_src->id;
                        }
                    }
                }
                $i++;
            }
        }
        else if ($kind=="items"){
            $item = new Item();
            $i = 0;
            foreach ($none_open_background as $temp_none_open_background){
                $temp_none_open_background_data = $item->none_set_open_background($temp_none_open_background->background_id);

                foreach($temp_none_open_background_data as $temp_data){
                    $none_open_background_data[$i]['id'] = $temp_data->id;
                    $none_open_background_data[$i]['name'] = $temp_data->name;
                    $none_open_background_data[$i]['info'] = $temp_data->info;
                    $none_open_background_data[$i]['category'] = $temp_data->category;
                    $none_open_background_data[$i]['img_src'] = $temp_data->img_src;
                }
                $i++;
            }
        }
        else if($kine=="relations"){
            $relation_list = new Relation_list();
            $i= 0;
            // foreach ($none_open_background as $temp_none_open_background){
            //     $temp_none_open_background_data = $item->none_set_open_background($temp_none_open_background->background_id);

            //     foreach($temp_none_open_background_data as $temp_data){
            //         $none_open_background_data[$i]['id'] = $temp_data->id;
            //         $none_open_background_data[$i]['name'] = $temp_data->name;
            //         $none_open_background_data[$i]['info'] = $temp_data->info;
            //         $none_open_background_data[$i]['category'] = $temp_data->category;
            //         $none_open_background_data[$i]['img_src'] = $temp_data->img_src;
            //     }
            //     $i++;
            // }
        }
        // item 일 경우
        // var_dump($none_open_background_data);
        return $none_open_background_data;
    }

    public function insert_open_background_data(Request $request){
        $data = $request->all();
        $backgroundShareController = new BackgroundShareController();
        if($data['kind']=="characters"){
            $backgroundShareController->insert_open_character_data($data);
        }
        else if($data['kind']=="items"){
            $backgroundShareController->insert_open_item_data($data);
        }

        return redirect('background/share');
    }
    public function insert_open_character_data($data){
        $open_character = new open_character();
        $open_ownership = new open_ownership();
        $novel_has_open_background = new Novel_has_open_background();

        $novel_id = $_COOKIE['novel_id'];

        
        $character_info = array();
        // $character_info['id'] = $data['id'];
        $character_info['name'] = $data['character_name'];
        $character_info['info'] = $data['character_content'];
        $character_info['age'] = $data['character_age'];
        $character_info['gender'] = $data['character_gender'];
        $character_info['img_src'] = $data['img_src'];

        $table_id = $open_character->insert_open_character($character_info);

        if(isset($data['ownership_id'])){
            // var_dump($data['ownership_id']);

            for($i = 0 ; $i < count($data['ownership_id']) ; $i++ ){
                // var_dump();
                $open_ownership->insert_open_ownership($table_id,$data['ownership_id'][$i]);
            }
            
        }
        $novel_has_open_background->insert_open_relation($novel_id,"characters",$table_id,$data['id']);
        // var_dump($data);

        return redirect('background/share');
    }
    public function get_open_character(){
        $novel_id = $_COOKIE['novel_id'];

        $novel_has_open_background = new Novel_has_open_background;
        // $open_character = new open_character;
        $open_ownership = new open_ownership;

        $return_novel_open_data = array(array(array()));

        $novel_open_data = $novel_has_open_background->get_data_by_open_character($novel_id);
        $i = 0;
        // var_dump($novel_open_data);
        foreach($novel_open_data as $temp_novel_open_data) {
            $return_novel_open_data[$i]['id'] = $temp_novel_open_data->open_background_id;
            $return_novel_open_data[$i]['name']= $temp_novel_open_data->name;
            $return_novel_open_data[$i]['info']= $temp_novel_open_data->info;
            $return_novel_open_data[$i]['age']= $temp_novel_open_data->age;
            $return_novel_open_data[$i]['gender']= $temp_novel_open_data->gender;
            $return_novel_open_data[$i]['img_src']= $temp_novel_open_data->img_src;

            $character_open_ownership = $open_ownership->get_open_ownership_by_character_id($return_novel_open_data[$i]['id']);
            $j = 0;
            foreach($character_open_ownership as $temp_character_open_ownership){
                $return_novel_open_data[$i]['ownership_id'][$j] = $temp_character_open_ownership->item_id;
                $return_novel_open_data[$i]['ownership_img_src'][$j] = $temp_character_open_ownership->img_src;
            }
            $i++;
        }

        return $return_novel_open_data;
    }

    public function insert_open_item_data($data){
        $open_item = new open_item();

        $novel_has_open_background = new Novel_has_open_background();

        $novel_id = $_COOKIE['novel_id'];

        
        $item_info = array();
        // $character_info['id'] = $data['id'];
        $item_info['name'] = $data['item_name'];
        $item_info['info'] = $data['item_content'];
        $item_info['category'] = $data['category'];
        $item_info['img_src'] = $data['img_src'];

        $table_id = $open_item->insert_open_item($item_info);

        $novel_has_open_background->insert_open_relation($novel_id,"items",$table_id,$data['id']);
        // var_dump($data);

        return redirect('background/share');
    }

    public function get_open_item(){

        $novel_id = $_COOKIE['novel_id'];

        $novel_has_open_background = new Novel_has_open_background;
        // $open_character = new open_character;

        $return_novel_open_data = array(array());

        $novel_open_data = $novel_has_open_background->get_data_by_open_item($novel_id);
        $i = 0;
        // var_dump($novel_open_data);
        foreach($novel_open_data as $temp_novel_open_data) {
            $return_novel_open_data[$i]['id'] = $temp_novel_open_data->open_background_id;
            $return_novel_open_data[$i]['name']= $temp_novel_open_data->name;
            $return_novel_open_data[$i]['info']= $temp_novel_open_data->info;
            $return_novel_open_data[$i]['category']= $temp_novel_open_data->category;
            $return_novel_open_data[$i]['img_src']= $temp_novel_open_data->img_src;

            $i++;
        }

        return $return_novel_open_data;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
