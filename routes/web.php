<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Admin\AdminRecipiController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\RecipiController;
use App\Http\Controllers\DetailController;

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

// Route::get('/index', function () {
//     return view('index');
// });

// 管理画面
// Route::prefix('/admin')
//      ->('admin')
//      ->('middleware')('auth')
//      ->group(function(){


//      })


//レシピ
Route::get('/admin/recipis', [AdminRecipiController::class, 'index'])->name('admin.recipis.index');
Route::get('/admin/recipis/create', [AdminRecipiController::class, 'create'])->name('admin.recipis.create')->middleware('auth');
Route::post('/admin/recipis', [AdminRecipiController::class, 'store'])->name('admin.recipis.store')->middleware('auth');
Route::get('/admin/recipis/{recipi}', [AdminRecipiController::class, 'edit'])->name('admin.recipis.edit')->middleware('auth');
Route::put('/admin/recipis/{recipi}', [AdminRecipiController::class, 'update'])->name('admin.recipis.update')->middleware('auth');
Route::delete('/admin/recipis/{recipi}', [AdminRecipiController::class, 'destroy'])->name('admin.recipis.destroy')->middleware('auth');

// ユーザー登録
Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');

// 認証
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login')->middleware('guest');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// 検索
Route::get('/serch', [RecipiController::class, 'serch'])->name('serch');
Route::get('/index', [RecipiController::class, 'index']);

// 詳細ページ
Route::get('/detail{recipi}', [DetailController::class, 'detail'])->name('detail');
