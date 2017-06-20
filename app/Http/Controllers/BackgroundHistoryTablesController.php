<?php

// 타임테이블 연산 처리를 위한 컨트롤러

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timetable;
use App\Character;
use App\Item;
use App\Effect;

class BackgroundHistoryTablesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $timeTable = new Timetable();
        $dataSet = $timeTable->dataBringAll();
        
        // var_dump($dataSet);
        // echo($dataSet[0]["event_names"]);
        $data = array(array());
        $i = 0;
        foreach ($dataSet as $datas){
            $data[$i]['id'] = $datas->id;
            $data[$i]['event_name'] = $datas->event_names;
            $data[$i]['event_content'] = $datas->event_contents;
            $data[$i]['start_day'] = $datas->start_days;
            $data[$i]['end_day'] = $datas->end_days;
            $data[$i]['other'] = $datas->others;
            $data[$i]['refer_info'] = $datas->refer_info;
            $data[$i]['refer_info'] = explode('^',$data[$i]['refer_info']);
            
            $i++;
        }
        return view('background.historyTable.history_table_view')->with("data", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('background.historyTable.history_table_view');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //  데이터 저장. post값으로 넘어온 값을 데이터베이스에 저장하는 메소드
    public function store(Request $request)
    {
        $table = $request->all();

        $timeTable = new Timetable();
        $effect = new Effect();
        $refer_info = "";

        for($i= 0; $i < count($table['refer_info']); $i++){
            if($i==0){
                $refer_info = $table['refer_info'][$i];
            }   
            else{
                $refer_info = $refer_info."^".$table['refer_info'][$i];
            }
            
        }
        var_dump($table['item_id']);
        var_dump($table['effect_item']);
        // $table['refer_info'] = $refer_info;

        // affect 데이터를 저장하기 위한 배열
        // characters, items, maps 아래 각각 id 와 content를 가지고 있음.
        $data = array(array(array()));
        $data['characters']['id'] = $table['character_id'];
        $data['characters']['content'] = $table['effect_character'];
        $data['items']['id'] = $table['item_id'];
        $data['items']['content'] = $table['effect_item'];
        // 차후 지도 정보 입력 시 연동
        // $data['maps']['id'] = $table['map_id'];
        // $data['maps']['content'] = $table['effect_map'];

        // 새로 입력 한 연대표 아이디값 반환
        $table_id = $timeTable->insert_table($table);

        // 관계 테이블에 데이터 저장
        $effect->insert_effect($table_id,$data);
        // return redirect(route('historyTable.index'));
    }

    public static function characters_effect_modal(){
        return view('background.historyTable.character_effect_modal');
    }

    public static function show_characters(){
        $character = new Character();

        $character_list = $character->dataBringAll();
        $list = array(array());
        $i = 0;
        foreach($character_list as $lists){
            $list[$i]["id"] = $lists->cha_id;
            $list[$i]["name"] = $lists->name;
            $list[$i]["img_src"] = $lists->img_src;    
            $i++;
        }

        return $list; 
    }

    public function character_effect_insert(){
        $table = "characters";
        $data = $request->all();
        $effect = new Effect();
        $effect->insert_effect($table, $data);
        return "success";
    }

    public static function items_effect_modal(){
        return view('background.historyTable.items_effect_modal');
    }

    public static function show_items(){
        $item = new Item();

        $item_list = $item->dataBringAll();
        $list = array(array());
        $i = 0;
        foreach($item_list as $lists){
            $list[$i]["id"] = $lists->id;
            $list[$i]["name"] = $lists->name;
            $list[$i]["img_src"] = $lists->img_src;    
            $i++;
        }

        return $list; 
    }

    public static function maps_effect_modal(){
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
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
