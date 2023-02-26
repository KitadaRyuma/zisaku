<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Store;
use App\Models\Comment;
use App\Models\UserComment;
use App\Models\Good;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;


class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $table = DB::table('comments');
        $mahjongs = $table->orderBy('comments.created_at', 'desc')
            ->join('stores_comments', 'comments.id', '=', 'stores_comments.comment_id')
            ->join('stores', 'stores_comments.store_id', '=', 'stores.id')
            ->limit(5)->get();

        $favorite = DB::table('goods')->where('user_id', Auth::id())->get();
        return view('mahjongs.main', compact('mahjongs', 'favorite'));
    }
}
