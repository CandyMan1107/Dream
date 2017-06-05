<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timetable;

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
            $data[$i]['event_name'] = $datas->event_names;
            $data[$i]['event_content'] = $datas->event_contents;
            $data[$i]['add_items'] = $datas->add_items;
            $data[$i]['start_day'] = $datas->start_days;
            $data[$i]['end_day'] = $datas->end_days;
            $data[$i]['character'] = $datas->characters;
            $data[$i]['other'] = $datas->others;

            // echo $data[$i]['event_name'];
            // echo $data[$i]['event_content'];
            // echo $data[$i]['add_items'];
            // echo $data[$i]['start_day'];
            // echo $data[$i]['end_day'];
            // echo $data[$i]['character'];
            // echo $data[$i]['other'];
            // echo $i;
            $i++;
        }
        return view('background.historyTable.history_table_view', $data);
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

        $timeTable->insert_table($table);
        // var_dump($table);
        return redirect(route('historyTable.index'));
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
