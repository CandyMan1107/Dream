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
/*
|--------------------------------------------------------------------------
| MAIN-page
|--------------------------------------------------------------------------
*/
Route::get('/', "MainController@index");

Route::get('/lib', function () {
    return view('load');
});

/*
|--------------------------------------------------------------------------
| RELATION-Background-page
|--------------------------------------------------------------------------
*/
Route::get('/background/relation', "RelationController@index");

Route::get('/background/relation/rmRel', "RelationController@removeRelation");

Route::get('/background/relation/mkRel', "RelationController@createRelation");

// 관계 저장
Route::post('/background/addRelation', "RelationController@relationStore");

// 관계 리스트 호출
Route::post('/background/getRelationList', "RelationController@getRelationList");

// 관계 삭제
Route::post('/background/removeList', "RelationController@removeList");

// 관계 정보 호출
Route::post('/background/getReContent', "MapController@getGridsContent");

/*
|--------------------------------------------------------------------------
| Map-Background-page
|--------------------------------------------------------------------------
*/

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



/*
|--------------------------------------------------------------------------
| CHAPTER & HISTORY-Background-page
|--------------------------------------------------------------------------
*/
Route::get('/chapter/episode/{id}','ChaptersController@get_episode');

Route::get('/chapter/noepisode/{id}/{this_chapter_id}','ChaptersController@get_no_episode');

Route::get('/chapter/timetable/{novel_id}/{chapter_id}','ChaptersController@get_timetable');

Route::get('/chapter/bringtimetable/{novel_id}/{chapter_id}','ChaptersController@bring_timetable');

Route::post('/chapter/addtimetable','ChaptersController@add_timetable');

Route::post('/chapter/add/episode','ChaptersController@add_episode');

Route::resource('/chapter', 'ChaptersController');

Route::resource('/background/things', 'BackgroundItemsController');

Route::post('/background/character/ownership', "BackgroundCharactersController@ownership");

Route::post('/background/character/ownership_icon', "BackgroundCharactersController@ownership_icon");

Route::post('/background/character/ownership_img', "BackgroundCharactersController@ownership_img");

Route::resource('/background/character', 'BackgroundCharactersController');

Route::post('/background/historyTable/getEffect',"BackgroundHistoryTablesController@getEffect");

Route::resource('/background/historyTable', 'BackgroundHistoryTablesController');

Route::resource('/background/share','BackgroundShareController');

Route::resource('/background', 'BackgroundController');


/*
|--------------------------------------------------------------------------
| NOVEL-Reader-page
|--------------------------------------------------------------------------
*/
Route::get('/novel/info/novel_info/{id}', "NovelController@novelInfo");
Route::get('/novel/read/novel_read_view/{id}', "NovelController@episodeShow");

/*
|--------------------------------------------------------------------------
| TODAY-Novel-page
|--------------------------------------------------------------------------
*/
Route::get('novel/kind/today_novel_by_day', "MainController@todayNovelShow");

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
// Route::get('/get_novel/get_notices',"cordoController@getNovelNotices");

// users 정보 get & 로그인
Route::get('/get_novel/userInfo', "cordoController@getUsersInfo");


//아이디 중복체크
Route::get('/get_user/id_check', "cordoController@idCheck");
//아이디 찾기
Route::get('/get_user/id_search', "cordoController@idSearch");
//비밀번호 찾기
Route::get('/get_user/pw_search', "cordoController@pwSearch");
// 회원가입
Route::get('/set_user/write_join', "cordoController@insertUserInfo");
// 유저 정보 가져오기
Route::get('/get_user/getUserInfo', 'cordoController@getUserInfo');

//캐릭터 목록 가져오기
Route::get('/get_novel/CharactersList', 'cordoController@getCharacters');
//캐릭터 정보 가져오기
Route::get('/get_novel/CharacterInfo', 'cordoController@getCharactersInfo');


// 작성한 소설의 유저정보 호출
Route::get('/get_novel/UserIdOfNovel', 'cordoController@getUserIdOfNovel');

//소설의 배경설정 중 사건을 가져오기
Route::get('/get_settings/historyGraphInfo', 'cordoController@getBackgroundSettingsHistoryGraph');
//소설의 배경설정 중 사건안에서 인물을 가져오기
Route::get('/get_settings/historyCharactersInfo', 'cordoController@getBackgroundSettingsHistoryCharacters');
//소설의 배경설정 중 사건안에서 아이템을 가져오기
Route::get('/get_settings/historyItemsInfo', 'cordoController@getBackgroundSettingsHistoryItems');
//소설의 배경설정 중 사건안에서 지도를 가져오기
Route::get('/get_settings/historyMapsInfo', 'cordoController@getBackgroundSettingsHistoryMaps');
//소설의 배경설정 중 인물들을 가져오기
Route::get('/get_settings/charactersInfo', 'cordoController@getBackgroundSettingsCharacters');
//소설의 배경설정 중 사물들을 가져오기
Route::get('/get_settings/itemsInfo', 'cordoController@getBackgroundSettingsItems');

//소설의 배경설정 중 지도들을 가져오기
Route::get('/get_settings/mapsInfo', 'cordoController@getBackgroundSettingsMaps');
//소설의 배경설정 중 관계정보들을 가져오기
Route::get('/get_settings/relationsInfo', 'cordoController@getBackgroundSettingsRelations');
//해당 유저의 포인트를 구매
Route::get('/set_point/set_point', 'cordoController@setPoint');
//해당 유저의 포인트를 보여주기
Route::get('/get_point/get_point', 'cordoController@getPoint');



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

// 관계정보 호출
Route::get('/write_novel/call_relation_info', "writeNovelController@callRelationInfo");

// 소유정보 호출
Route::get('/write_novel/call_ownership_info', "writeNovelController@callOwnershipInfo");

// 태그 정보 호출
Route::get('/write_novel/get_tags', "writeNovelController@getTags");
Route::get('/write_novel/get_tag_by_id', "writeNovelController@getTagById");

// 연대표 정보 호출
Route::get('/write_novel/get_timetables_info', "writeNovelController@getTimetablesInfo");

// 사건에 연관된 배경 정보 호출
Route::get('/write_novel/call_affect_info', "writeNovelController@callAffectInfo");



// 이미지 등록부
// 소설 커버 이미지 등록
Route::post('/write_novel/addCover', "UpImgController@uploadImg");

// 소설 커버 이미지 삭제
Route::get('/write_novel/removeCover', "UpImgController@removeImg");

// 회차 커버 이미지 등록
Route::post('/write_novel/addEpisodeCover', "UpImgController@uploadEpisodeImg");

// 회차 커버 이미지 삭제
Route::get('/write_novel/removeEpisodeCover', "UpImgController@removeEpisodeImg");


Route::post('/background/map/tag',"TagsAddController@map_tag_insert");

Route::get('/background/tagsAdd/get', "TagsAddController@getData");

Route::resource('/tagsAdd', 'TagsAddController');

/**************************************
BLOG
**************************************/
// Route::get('/blog/write', "BlogController@createMenu");

Route::resource('/blog', 'BlogController');

Route::get('/cash', "Controller@cashView");

// 웹페이지 로그인

Route::get('/login', 'MemberController@login_index');
Route::post('/login', 'MemberController@login');

Route::get('/logout', 'MemberController@logout');

// 웹페이지 회원가입
Route::get('/register', 'MemberController@register_index');
Route::post('/register', 'MemberController@register');

// 캐시 충천
Route::get('/cash', function () {
    return view('novel.cash');
});

/*
|--------------------------------------------------------------------------
| BLOG
|--------------------------------------------------------------------------
*/
Route::get('/blog/setMap/{id}', "BlogController@viewSetMapMain");

Route::get('/blog/menu/{id}', "BlogController@selectedMenuAllB");
Route::get('/blog/setMap/createMenu/{id}', "BlogController@createMenu");
Route::get('/blog/setMap/storeMenu/{id}', "BlogController@storeMenu");
Route::get('/blog/setMap/destroyMenu/{id}', "BlogController@destroyMenu");

Route::get('/blog/create/{id}', "BlogController@createBoard");

Route::resource('/blog', "BlogController");
