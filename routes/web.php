<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/lib', function () {
    return view('load');
});

Route::get('/background', function(){
    return view('background/background_main');
});

Route::get('/novel/novel_info', function(){
    return view('novel/novel_info');
});

Route::get('/background/historyTable', function(){
    return view('background/historyTable/history_table_view');
});

Route::get('/background/character', function(){
    return view('background/character/character_view');
});

Route::get('/background/things', function(){
    return view('background/things/things_view');
});

Route::get('/background/relation', function(){
    return view('background/relationship/relationship_view');
});

Route::get('/background/map', function(){
    return view('background/map/map_view');
});

Route::get('/background/share', function(){
    return view('background/share/set_share_view');
});


// 소설 작성부
// 소설 정보 작성
Route::get('/write_novel/set', function(){
    return view('write_novel/write_novel_set');
});

// 소설 정보 작성 - 표지 이미지 등록
Route::get('/write_novel/uploadImg', "UpImgController@popUploadImgWindow");

// 이미지 업로드 및 DB 적용
Route::get('/write_novel/showUploaded', "UpImgController@showUploadFile");

// 회차 내용 작성
Route::get('/write_novel/view', function(){
    return view('write_novel/write_novel_view');
});
