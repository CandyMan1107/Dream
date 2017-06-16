<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackgroundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
         // $background = \App\
         // return __METHOD__ . '은(는) 컬렉션을 조회합니다.';
         return view('background.background_main');
     }

    public function index_map()
    {
        $maps = DB::select('maps');

        // $background = \App\
        // return __METHOD__ . '은(는) 컬렉션을 조회합니다.';
        return view('background.map.map_view')->with('links', $maps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return __METHOD__ . '은(는) 컬랙션을 만들기 위한 폼을 담은 뷰를 반환.';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return __METHOD__ . '은(는) 사용자으 ㅣ입력한 폼 데이터를 새로운 컬렉션으로 만듬';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return __METHOD__ . '은(는) 다음 기본 키를 가진 모델을 조회합니다.';


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

    public function abc($id){
        return __METHOD__ . '은(는) 실험.';
    }
}
