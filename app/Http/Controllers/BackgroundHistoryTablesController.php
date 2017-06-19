<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timetable;
use App\Character;
use App\Item;

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
    public function store(Request $request)
    {
        $table = $request->all();

        $timeTable = new Timetable();

        $refer_info = "";

        for($i= 0; $i < count($table['refer_info']); $i++){
            if($i==0){
                $refer_info = $table['refer_info'][$i];
            }   
            else{
                $refer_info = $refer_info."^".$table['refer_info'][$i];
            }
            
        }
        $table['refer_info'] = $refer_info;

        $timeTable->insert_table($table);
        return redirect(route('historyTable.index'));
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
    public static function items_effect_modal(){
        
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
