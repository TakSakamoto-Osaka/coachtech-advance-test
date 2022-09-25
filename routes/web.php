<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|-------------------------------------------------------------------------R
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//  お問い合わせ関連URL
Route::prefix('contact')->group( function () {
  Route::get('/',         [ContactController::class, 'get_contact']);   //  お問い合わせページ[GET]
  Route::post('/',        [ContactController::class, 'post_contact']);  //  お問い合わせページ[POST]
  Route::get('/confirm',  [ContactController::class, 'confirm']);       //  内容確認ページ
  Route::get('/thanks',   [ContactController::class, 'thanks']);        //  Thanksページ(DBに新規レコード追加)
});

//  管理システム関連URL
Route::prefix('admin')->group( function () {
  Route::get('/',         [AdminController::class, 'admin']);         //  管理システムページ
  Route::post('/search',  [AdminController::class, 'search']);        //  検索
  Route::get('/reset',    [AdminController::class, 'reset']);         //  リセット
  Route::get('/delete',   [AdminController::class, 'delete']);        //  削除
});


