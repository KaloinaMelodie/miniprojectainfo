<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AinfofoController;
use App\Http\Controllers\UtiController;
use Illuminate\Http\Request;
use App\Models\MymeType;

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
// Route::middleware('cache.headers:public;max_age=3600;etag')->group(function () {
//     Route::get('/assets/{any}', function ($mylink) {
//         $path =$mylink
//         // $path=str_replace('/','\\',$path);
//         if (File::exists($path)) {

Route::middleware('cache.headers:public;max_age=3600;etag')->group(function () {
    Route::get('/assetsFO/{any}', function ($mylink) {
        $path = 'vendor/' . $mylink;
        echo $path;
        // $path = $mylink;
        //$path=str_replace('/','\\',$path);
        if (File::exists($path)) {
            $contentType=(new MymeType())->mime_type($path);
            $response = new Illuminate\Http\Response(File::get($path), 200);
            $response->header('Content-Type', $contentType);
            return $response;
        } else {
            abort(404);
        }
    })->where('any', '.*');
    // Route::get('/ckeditor/{any}', function ($mylink) {
    //     // $path = '/vendor/' . $request->path();
    //     // $path=str_replace('/','\\',$path);

    //     if (File::exists(public_path($path))) {
    //         $contentType=(new MymeType())->mime_type($path);
    //         $response = new Illuminate\Http\Response(File::get(public_path($path)), 200);
    //         $response->header('Content-Type', $contentType);
    //         return $response;
    //     } else {
    //         abort(404);
    //     }
    // })->where('any', '.*');
    
});
// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('uti')->group(function () {
    Route::post('/login',[UtiController::class,"login"])->name('uti-login.post');
    Route::get('/deconnect',[UtiController::class,"deconnect"]);
});

Route::prefix('ainfobo')->group(function () {
    Route::get('/', function () {
        return view('BO/Login');
    });
    Route::prefix('articles')->group(function () {
        Route::get('/', 'App\Http\Controllers\ArticleController@list');
        Route::get('create',  'App\Http\Controllers\ArticleController@create'); // go to page CreateArticle.blade.php
        Route::post('/', 'App\Http\Controllers\ArticleController@save')->name('articles.post');
        Route::get('/{idarticle}/edit', 'App\Http\Controllers\ArticleController@edit');//go to page EditArticle
        Route::put('/{idarticle}', 'App\Http\Controllers\ArticleController@update')->name('articles.put');
    });
});

Route::get('/','App\Http\Controllers\AinfofoController@accueil');
Route::get('/article-{idarticle}/{slug}',[AinfofoController::class,"fiche"])->where('slug', '([A-Za-z0-9\-]+)');;
Route::get('/categorie-{id}/{slug}',[AinfofoController::class,"categorie"])->where('slug', '([A-Za-z0-9\-]+)');;


Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::get('/image-upload', 'ImageUploadController@index')->name('image-upload.index');
    Route::post('/image-upload', 'ImageUploadController@upload')->name('image-upload.post');
});