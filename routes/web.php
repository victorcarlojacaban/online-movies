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
    return redirect('movies?&keyword={money}&matchtype={matcht}&creative={ad2}&gclid={556688}');
});

// Route::get('/movies', 'MovieController@index');


Route::get('/movies', [
    'uses' => 'MovieController@index',
    'keyword' => '{money}',
    'matchtype' => '{matcht}',
    'creative' => '{ad2}',
    'gclid' => '{556688}'
]);


Route::post('loaddata','MovieController@loadDataAjax');
Route::get('/movies/show/{id}', 'MovieController@show');

Route::get('/tvshows', [
    'uses' => 'TvController@index',
    'keyword' => '{money}',
    'matchtype' => '{matcht}',
    'creative' => '{ad2}',
    'gclid' => '{556688}'
]);

Route::post('loaddatatv','TvController@loadDataAjax');
Route::get('/tvshows/show/{id}', 'TvController@show');

Route::get('/privacy','HomeController@privacy');
Route::get('/dmca','HomeController@dmca');
Route::get('/aboutus','HomeController@aboutus');