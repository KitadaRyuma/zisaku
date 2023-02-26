<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use App\Models\Good;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //条件式 if お気に入り登録をしようとしているコメントがuserIDで絞り込んだお気に入りテーブルにコメントIDがあるかどうか
    // お気に入りテーブルをログインしているユーザーIDでセレクトする
    // ↓
    // セレクト二つ
    // と今登録しようとしているものをセレクトする
    public function index()
    {
        $favorite = DB::table('goods')->where(['user_id' => $_GET['user_id'], 'comment_id' => $_GET['comment_id']])->first();
        if (isset($favorite)) {
            Good::find($favorite->id)->delete();
        } else {
            Good::create([
                "user_id" => $_GET['user_id'],
                "comment_id" => $_GET['comment_id'],
            ]);
        }
    }
}
