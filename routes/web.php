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

<<<<<<< HEAD
Route::get('/novel', function(){
    return view('novel/novel_info');
});

=======
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
>>>>>>> 03a4ac41e0434e36cd86f1b36ef7a07368a62037
