<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use App\Models\Store;
use App\Models\Good;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class SearchApiController extends Controller
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
    public function index(Request $request)
    {
        $mahjongs = Store::where('name', 'LIKE', '%'.$request->search.'%')->get();
        $favorite = DB::table('goods')->where('user_id', Auth::id())->get();
        return view('mahjongs.storesearch',compact('mahjongs','favorite'));
    }
}
