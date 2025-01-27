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
Route::post('post','Email@store');

Route::get('/', [ 'uses'=>'HomeCtrl@index' ]);
Route::post('login', 'UserCtrl@do_login');
Route::get('logout', function() {
    Auth::logout();
    session()->flush();
    return redirect('/');
});

Route::group(['prefix' => 'register'],function(){
  Route::get('/', ['as' => 'register', 'uses' => 'registerCtrl@index']);
  Route::get('doregister',['uses'=> 'registerCtrl@doregister']);
});

Route::group(['prefix' => 'approve'],function(){
  Route::get('/', ['uses' => 'registerCtrl@approveView']);
  Route::get('dat', ['uses'=> 'registerCtrl@dat']);
  Route::get('save/{nip}',['uses'=> 'registerCtrl@save','middleware'=>'permission:approved']);
  Route::get('delete/{nip}',['uses'=> 'registerCtrl@destroy']);
});
// Route::group(['prefix' => 'pengurus'], function(){
//   Route::get('/', ['uses' => 'PengurusCtrl@index', 'middleware' => 'permission:pengurus_index']);
// });
Route::get('forums', 'ForumCtrl@index');

Route::post('forum/add_subject', ['uses' => 'ForumCtrl@saveinto']);


Route::group(['prefix' => 'Pengurus' ],function(){
    Route::get('/', ['uses'=> 'PengurusCtrl@index', 'middleware' => 'permission:pengurus_index']);
    Route::get('dat', ['uses'=> 'PengurusCtrl@dat', 'middleware' => 'permission:pengurus_index']);
    Route::get('gdata', ['uses'=> 'PengurusCtrl@gdata', 'middleware' => 'permission:pengurus_index']);
    Route::get('create/{id?}', [ 'uses' => 'PengurusCtrl@create', 'middleware' => 'permission:pengurus_create' ]);
    // Route::post('save', [ 'uses' => 'PengurusCtrl@store', 'middleware' => 'permission:pengurus_create' ]);
    Route::post('saveimage',['uses' => 'PengurusCtrl@saveimage', 'middleware' => 'permission:pengurus_index']);
    Route::post('save', [ 'uses' => 'PengurusCtrl@save', 'middleware' => 'permission:pengurus_create' ]);

});

Route::group(['prefix' => 'strukturOrg' ],function(){
    Route::get('/', ['uses'=> 'PengurusCtrl@struktur', 'middleware' => 'permission:pengurus_index']);
});

Route::group(['prefix' => 'history' ],function(){
    Route::get('/', ['uses'=> 'PengurusCtrl@history', 'middleware' => 'permission:history_index']);
});

Route::group(['prefix' => 'anggota'], function(){
  Route::get('/', ['uses' => 'AnggotaCtrl@index', 'middleware' => 'permission:anggota_index']);
  Route::get('data', ['uses' => 'AnggotaCtrl@data', 'middleware' => 'permission:anggota_index']);
  Route::get('profil/{nip}',['uses' => 'AnggotaCtrl@lihatprofil', 'middleware' => 'permission:anggota_index']);
});

Route::group(['prefix' => 'sharing'], function(){
  Route::get('/', ['uses' => 'SharingCtrl@index', 'middleware' => 'permission:sharing_index']);
  Route::get('ldata', ['uses' => 'SharingCtrl@ldata', 'middleware' => 'permission:sharing_index']);
  Route::get('create', ['uses' => 'SharingCtrl@create', 'middleware' => 'permission:sharing_create|sharing_update']);
  Route::get('download/{id}', ['uses' => 'SharingCtrl@download', 'middleware' => 'permission:sharing_download']);
  Route::get('delete/{id}', ['uses' => 'SharingCtrl@destroy', 'middleware' => 'permission:sharing_delete']);
  Route::post('save', ['uses' => 'SharingCtrl@save', 'middleware' => 'permission:sharing_index']);

});

Route::group(['prefix' => 'polling'], function(){
  Route::get('/', ['uses'=> 'PollingCtrl@index', 'middleware' => 'permission:polling_index']);
  Route::get('gdata', [ 'uses' => 'PollingCtrl@gdata', 'middleware' => 'permission:polling_index' ]);
  Route::get('user', [ 'uses' => 'PollingCtrl@user', 'middleware' => 'permission:polling_index' ]);
  Route::post('hitung/{id}', [ 'uses' => 'PollingCtrl@entahlah', 'middleware' => 'permission:polling_index' ]);
  Route::get('create', [ 'uses' => 'PollingCtrl@create', 'middleware' => 'permission:polling_create' ]);
  Route::get('tambah', [ 'uses' => 'PollingCtrl@tambah', 'middleware' => 'permission:polling_create' ]);
  Route::get('activate/{id}', [ 'uses' => 'PollingCtrl@activate', 'middleware' => 'permission:polling_create' ]);
  Route::get('deactivate/{id}', [ 'uses' => 'PollingCtrl@deactivate', 'middleware' => 'permission:polling_create' ]);
  Route::get('save', [ 'uses' => 'PollingCtrl@save', 'middleware' => 'permission:polling_index' ]);

});

Route::group(['prefix' => 'forum'], function(){
  Route::get('/',['uses' => 'ForumCtrl@index', 'middleware' => 'permission:forum_index']);
  Route::get('create/{id}', [ 'uses' => 'ForumCtrl@create', 'middleware' => 'permission:forum_create|forum_update' ]);
  Route::get('createthread/{id}', [ 'uses' => 'ForumCtrl@createthread', 'middleware' => 'permission:forum_create|forum_update' ]);
  Route::get('createkategori/{id?}', [ 'uses' => 'ForumCtrl@createkategori', 'middleware' => 'permission:forum_create|forum_update' ]);
  Route::get('deletekate/{id}', [ 'uses' => 'ForumCtrl@deletekate', 'middleware' => 'permission:forum_delete' ]);
  Route::get('deletethread/{id}', [ 'uses' => 'ForumCtrl@deletethread', 'middleware' => 'permission:forum_delete' ]);
  Route::get('addkategori', [ 'uses' => 'ForumCtrl@addkategori', 'middleware' => 'permission:forum_create|forum_update' ]);
  Route::get('addisi', [ 'uses' => 'ForumCtrl@addisi', 'middleware' => 'permission:forum_create|forum_update' ]);
  Route::get('view/{id}', [ 'uses' => 'ForumCtrl@view', 'middleware' => 'permission:forum_create|forum_update' ]);
  Route::post('addcomm', [ 'uses' => 'ForumCtrl@addcomm', 'middleware' => 'permission:forum_create|forum_update' ]);
  Route::get('dat', [ 'uses' => 'ForumCtrl@dat', 'middleware' => 'permission:forum_index' ]);
  Route::get('dataforum/{id}', [ 'uses' => 'ForumCtrl@dataforum', 'middleware' => 'permission:forum_index' ]);
  Route::get('kategori/{id}', [ 'uses' => 'ForumCtrl@addpost', 'middleware' => 'permission:forum_index' ]);
});


Route::group(['prefix' => 'news'], function(){
  Route::get('/', ['uses' => 'NewsCtrl@index', 'middleware' => 'permission:news_index']);
  Route::get('view', ['uses'=> 'NewsCtrl@userv', 'middleware' => 'permission:viewnews_index']);
  Route::get('dat', ['uses' => 'NewsCtrl@ldata', 'middleware' => 'permission:news_index']);
  Route::get('read/{Id}', ['uses'=> 'NewsCtrl@detail', 'middleware' => 'permission:viewnews_index']);
  Route::get('getnews', ['uses' => 'NewsCtrl@getNews', 'middleware' => 'permission:news_index']);
  Route::get('userv', ['uses' => 'NewsCtrl@userv', 'middleware' => 'permission:news_index']);
  Route::get('create/{id?}', ['uses' => 'NewsCtrl@create', 'middleware' => 'permission:news_index']);
  Route::get('delete/{id}', ['uses' => 'NewsCtrl@destroy', 'middleware' => 'permission:news_index']);
  Route::post('save', ['uses' => 'NewsCtrl@save', 'middleware' => 'permission:news_index']);

});
// middleware routes
Route::group(['prefix' => 'contacs'], function(){
  Route::get('/', ['uses' => 'ContacsCtrl@index', 'middleware' => 'permission:contacs_index']);
  Route::get('mail', ['uses' => 'ContacsCtrl@mail', 'middleware' => 'permission:contacs_index']);
});
Route::group([ 'prefix' => 'menus' ], function() {
    Route::get('/', [ 'uses' => 'MenuCtrl@index', 'middleware' => 'permission:menu_index' ]);
    Route::get('tree', [ 'uses' => 'MenuCtrl@tree', 'middleware' => 'permission:menu_index' ]);
    Route::post('save', [ 'uses' => 'MenuCtrl@store', 'middleware' => 'permission:menu_create' ]);
    Route::post('update', [ 'uses' => 'MenuCtrl@store', 'middleware' => 'permission:menu_update' ]);
    Route::get('delete', [ 'uses' => 'MenuCtrl@destroy', 'middleware' => 'permission:menu_delete' ]);
    Route::get('{type}/{id}', [ 'uses' => 'MenuCtrl@create', 'middleware' => 'permission:menu_create|menu_update' ]);
});

Route::group([ 'prefix' => 'roles' ], function() {
    Route::get('/', [ 'uses' => 'RoleCtrl@index', 'middleware' => 'permission:role_index' ]);
    Route::get('dt', [ 'uses' => 'RoleCtrl@dt', 'middleware' => 'permission:role_index' ]);
    Route::get('create/{id?}', [ 'uses' => 'RoleCtrl@create', 'middleware' => 'permission:role_create|role_update' ]);
    Route::get('tree', [ 'uses' => 'RoleCtrl@tree', 'middleware' => 'permission:role_create|role_update' ]);
    Route::post('save', [ 'uses' => 'RoleCtrl@store', 'middleware' => 'permission:role_create' ]);
    Route::post('update', [ 'uses' => 'RoleCtrl@store', 'middleware' => 'permission:role_update' ]);
    Route::get('delete/{id}', [ 'uses' => 'RoleCtrl@destroy', 'middleware' => 'permission:role_delete' ]);
});

Route::group([ 'prefix' => 'users' ], function() {
    Route::get('/', [ 'uses' => 'UserCtrl@index', 'middleware' => 'permission:user_index' ]);
    Route::get('dt', [ 'uses' => 'UserCtrl@dt', 'middleware' => 'permission:user_index' ]);
    Route::get('create/{id?}', [ 'uses' => 'UserCtrl@create', 'middleware' => 'permission:user_create|user_update' ]);
    Route::post('save', [ 'uses' => 'UserCtrl@store', 'middleware' => 'permission:user_create' ]);
    Route::post('update', [ 'uses' => 'UserCtrl@store', 'middleware' => 'permission:user_update' ]);
    Route::get('reset/{id}', [ 'uses' => 'UserCtrl@reset', 'middleware' => 'permission:user_update' ]);
    Route::get('delete/{id}', [ 'uses' => 'UserCtrl@destroy', 'middleware' => 'permission:user_delete' ]);
});

Route::group([ 'prefix' => 'profil' ], function() {
    Route::get('/', [ 'uses' => 'ProfilCtrl@index', 'middleware' => 'permission:profil_index' ]);
    Route::get('edit', [ 'uses' => 'ProfilCtrl@edit', 'middleware' => 'permission:profil_index' ]);
    Route::post('cek/{id}', [ 'uses' => 'ProfilCtrl@cek', 'middleware' => 'permission:profil_index' ]);
    // Route::post('save', [ 'uses' => 'UserCtrl@store', 'middleware' => 'permission:user_create' ]);
    // Route::post('update', [ 'uses' => 'UserCtrl@store', 'middleware' => 'permission:user_update' ]);
    // Route::get('delete/{id}', [ 'uses' => 'UserCtrl@destroy', 'middleware' => 'permission:user_delete' ]);
});
