<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\StoreController;;


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

// Route::get('/bootstrap', function () {
//     return view('bootstrap');
// });
Route::get('/', [LoginController::class, 'index']);
Route::get('/index', [LoginController::class, 'index']);
Route::post('/login/page', [LoginController::class, 'index'])->name('signup.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::get('/login', [Logincontroller::class, 'index'])->name('mahjongs.login');
Route::get('/signup', [AccountController::class, 'register']);
Route::post('/signup', [AccountController::class, 'register'])->name('mahjongs.signup');
Route::post('/signupconfirm', [AccountController::class, 'confirm'])->name('mahjongs.signupconfirm');
Route::get('/passforget', [AccountController::class, 'forgotpass'])->name('mahjongs.passforget');
Route::post('/passforget/complete', [AccountController::class, 'change_complete'])->name('password.login');
Route::get('/main', [MainController::class, 'index']);
Route::post('/main', [MainController::class, 'index'])->name('mahjongs.main');
Route::post('/mahjongs/storelist', [StoreController::class, 'store'])->name('main.store');
Route::get('/store', [StoreController::class, 'index']);
Route::post('/store', [StoreController::class, 'storeDetail'])->name('storelist.store');
Route::post('/store/delete', [StoreController::class, 'delete'])->name('store.main');
Route::get('/storesearch', [StoreController::class, 'storesearch']);
Route::post('/storesearch', [SearchApiController::class, 'index'])->name('search');
Route::post('/storeedit', [StoreController::class, 'update'])->name('edit.main');
Route::post('/storeedit/edit', [StoreController::class, 'show'])->name('store.edit');
Route::get('/storeedit/edit', [StoreController::class, 'valshow']);
Route::post('/storeconfirm', [StoreController::class, 'storeconfirm'])->name('store.confirm');
Route::post('/storeadd', [StoreController::class, 'storeadd'])->name('store.add');
Route::get('/storecreate', [StoreController::class, 'createindex']);

Route::get('/commentlist', [CommentController::class, 'commentlist']);
Route::get('/commentall', [CommentController::class, 'commentall']);
Route::post('/commentall', [CommentController::class, 'commentall'])->name('comentAll');
Route::post('/commentdetail', [CommentController::class, 'commentDetail'])->name('commentdetail');
Route::get('/commentsubmission', [CommentController::class, 'commentsubmission']);
Route::post('/commentsubmission', [CommentController::class, 'index'])->name('comment');
Route::post('/commentsubmission/create', [CommentController::class, 'create'])->name('comment.main');
Route::post('/commentedit', [CommentController::class, 'update'])->name('edit.main');
Route::post('/commentedit/edit', [CommentController::class, 'commentEdit'])->name('store.commentedit');
Route::post('/comment/delete', [CommentController::class, 'delete'])->name('comment.delete');

Route::get('/favorite', [FavoriteController::class, 'index']);
Route::get('/mycommentlist', [CommentController::class, 'mycommentlist']);
Route::get('/mypage', [AccountController::class, 'information'])->name('header.mypage');
Route::post('/mypage', [AccountController::class, 'mypage'])->name('mahjongs.mypage');
Route::post('/mypage/page', [AccountController::class, 'update'])->name('mypageedit.main');
Route::get('/mypagedelete', [AccountController::class, 'delete'])->name('mypage.delete');
Route::get('/mypageedit', [AccountController::class, 'show'])->name('mypage.mypageedit');
Route::get('/logout', [AccountController::class, 'logout'])->name('logout');

Route::post('/search', [SearchApiController::class, 'index'])->name('search');