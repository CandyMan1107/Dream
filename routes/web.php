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
/**************************************
MAIN
**************************************/
Route::get('/', "MainController@index");


Route::get('/lib', function () {
    return view('load');
});

/**************************************
RELATION - BACKGROUND
**************************************/
Route::get('/background/relation', "RelationController@index");

Route::get('/background/relation/rmRel', "RelationController@removeRelation");

Route::get('/background/relation/mkRel', "RelationController@createRelation");

/**************************************
MAP - BACKGROUND
**************************************/

// 지도 등록
Route::post('/background/addMap', "MapController@mapStore");

//지도 삭제
Route::post('/background/removeMap', "MapController@removeMap");



// 지도 이미지 등록
Route::post('/background/addMapImg', "MapController@mapImgStore");

//지도 리스트 호출
Route::post('/background/getMapList', "MapController@getMapList");

//지도 아이디의 그리드, 텍스트 정보 호출
Route::post('/background/getGridsContent', "MapController@getGridsContent");

// 지도 이미지 호출
Route::get('/background/getImgCellList', "MapController@getImgCellList");
// 지도 이미지 띄우기
Route::get('/background/map', "MapController@index");



// 지도 이미지 삭제
Route::get('/background/removeImg', "MapController@removeImg");


// Route::get('/login', function () {
//     return view('auth/login');
// });

/**************************************
CHARACTER & HISTORY - BACKGROUND
**************************************/
Route::resource('/background/things', 'BackgroundItemsController');

Route::post('/background/character/ownership', "BackgroundCharactersController@ownership");

Route::post('/background/character/ownership_icon', "BackgroundCharactersController@ownership_icon");

Route::post('/background/character/ownership_img', "BackgroundCharactersController@ownership_img");

Route::resource('/background/character', 'BackgroundCharactersController');

Route::post('/background/historyTable/effectCharacter',"BackgroundHistoryTablesController@character_effect_insert");

Route::resource('/background/historyTable', 'BackgroundHistoryTablesController');

Route::resource('/background', 'BackgroundController');

/**************************************
NOVEL VIEW
**************************************/
// Novel Info
Route::get('/novel/info/novel_info/{id}', "NovelController@novelInfo");

// Novel Episode
Route::get('/novel/read/novel_read_view/{id}', "NovelController@episodeShow");

// Today Novel
Route::get('novel/kind/today_novel_by_day', "MainController@todayNovelShow");


// Background SHARE
Route::get('/background/share', function(){
    return view('background/share/set_share_view');
});

/**************************************
CORDOVA VIEWER
**************************************/
// 코도바 뷰어부
Route::get('/get_novel', "cordoController@getNovelInfo");
Route::get('/get_novel/today_best', "cordoController@getTodayBestNovelInfo");
Route::get('/get_novel/fantasy_best', "cordoController@getFantasyBestNovelInfo");
Route::get('/get_novel/romance_best', "cordoController@getRomanceBestNovelInfo");
Route::get('/get_novel/monday', "cordoController@getMondayNovelInfo");
Route::get('/get_novel/tuesday', "cordoController@getTuesdayNovelInfo");
Route::get('/get_novel/wednesday', "cordoController@getWednesdayNovelInfo");
Route::get('/get_novel/thursday', "cordoController@getThursdayNovelInfo");
Route::get('/get_novel/friday', "cordoController@getFridayNovelInfo");
Route::get('/get_novel/saturday', "cordoController@getSaturdayNovelInfo");
Route::get('/get_novel/sunday', "cordoController@getSundayNovelInfo");
Route::get('/get_novel/search',"cordoController@getNovelFromSearch");
Route::get('/get_novel/show_main_novel',"cordoController@getNovelById");
Route::get('/get_novel/get_episodes',"cordoController@getNovelEpisodes");
Route::get('/get_novel/get_episode_id',"cordoController@getNovelEpisodeById");
//Route::get('/get_novel/get_notices',"cordoController@getNovelNotices");
// 소설 작성부
// 소설 정보 작성
Route::get('/write_novel/set', "writeNovelController@setNovelView");
// 소설 정보 등록
Route::get('/write_novel/create_novel', "writeNovelController@createNovel");
// 소설 회차 등록
Route::post('/write_novel/create_episode', "writeNovelController@createEpisode");

// 소설 정보 getter
Route::get('/write_novel/get_novel_info', "writeNovelController@getNovelInfo");

// 회차 정보 getter
Route::get('/write_novel/get_episode_info', "writeNovelController@getEpisodeInfo");

// 나의소설
Route::get('/write_novel/my_novel', "writeNovelController@myNovelView");

// 회차 내용 작성
Route::get('/write_novel/write_episode/{novelId}', "writeNovelController@writeNovelEpisodeView");

// 소설 배경 정보 호출
Route::get('/write_novel/call_background_info', "writeNovelController@callBackgroundInfo");

// 태그 정보 호출
Route::get('/write_novel/get_tags', "writeNovelController@getTags");
Route::get('/write_novel/get_tags', "writeNovelController@getTags");

// 이미지 등록부
// 커버 이미지 등록
Route::post('/write_novel/addCover', "UpImgController@uploadImg");

// 커버 이미지 삭제
Route::get('/write_novel/removeCover', "UpImgController@removeImg");


Route::get('/background/tagsAdd/get', "TagsAddController@getData");

Route::resource('/tagsAdd', 'TagsAddController');

// 로그인 인증
Auth::routes();

// 로그인
Route::get('/home', 'HomeController@index')->name('home');
