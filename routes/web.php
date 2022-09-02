<?php

use App\Http\Controllers\TodoFormController;
use Illuminate\Support\Facades\Route;

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
//一覧表示
Route::get('/MessageBoard/index', [TodoFormController::class, 'index']);

//検索絞り込み
Route::post('/MessageBoard/index', [TodoFormController::class, 'search']);

//詳細表示
Route::get('/MessageBoard/detail/{id}', [TodoFormController::class, 'detail']);
//状態変更
Route::get('/MessageBoard/change/{id}', [TodoFormController::class, 'change']);

//新規追加画面表示
Route::get('/MessageBoard/add',  [TodoFormController::class, 'input']);
//追加実行
Route::post('/MessageBoard/add', [TodoFormController::class, 'add']);

//完全削除
Route::get('/MessageBoard/delete/{id}', [TodoFormController::class, 'deleted']);
//論理削除
Route::post('/MessageBoard/delete/{id}', [TodoFormController::class, 'performDeleteOnModel']);
//ごみ箱一覧
Route::get('/MessageBoard/remove', [TodoFormController::class, 'remove']);
//復元
Route::get('/MessageBoard/remove/{id}', [TodoFormController::class, 'remove_acction']);

//編集画面表示
Route::get('/MessageBoard/edit/{id}', [TodoFormController::class, 'edit']);
//編集保存
Route::post('/MessageBoard/edit/{id}', [TodoFormController::class, 'update']);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
