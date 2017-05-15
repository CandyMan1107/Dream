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