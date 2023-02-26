<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use App\Models\UsersComment;
use App\Models\Store;
use App\Models\StoresComment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class CommentController extends Controller
{
    public function index(Request $request)
    {
        $mahjongs = $request->id;
        return view('mahjongs.commentsubmission', compact('mahjongs'));
    }

    public function commentlist(Request $request)
    {
        $table = DB::table('comments');
        $count = $table->count() / 5;
        $mahjongs = $table->orderBy('comments.created_at', 'desc')
            ->join('stores_comments', 'comments.id', '=', 'stores_comments.comment_id')
            ->join('stores', 'stores_comments.store_id', '=', 'stores.id')
            ->offset(1)->limit(5)->get();
        $favorite = DB::table('goods')->where('user_id', Auth::id())->get();
        return view('mahjongs.commentlist', compact('mahjongs', 'favorite' , 'count'));
    }

    public function commentall(Request $request)
    {
        $param = isset($request->num) ? $request->num : 0 ;
        $table = DB::table('comments');
        $count = $table->count() / 5;
        $mahjongs = $table->orderBy('comments.created_at', 'desc')
            ->join('stores_comments', 'comments.id', '=', 'stores_comments.comment_id')
            ->join('stores', 'stores_comments.store_id', '=', 'stores.id')
            ->offset($param)->limit(5)->get();
        $favorite = DB::table('goods')->where('user_id', Auth::id())->get();
        return view('mahjongs.commentlist', compact('mahjongs', 'favorite' , 'count'));
    }

    // CommentDetail

    public function commentDetail(Request $request)
    {
        $user_comment = DB::table('comments')->where('comments.id', $request->id)
            ->join('users_comments', 'comments.id', '=', 'users_comments.comment_id')
            ->first();

        $comments =  DB::table('comments')->where('comments.id', $request->id)
            ->join('stores_comments', 'comments.id', '=', 'stores_comments.comment_id')
            ->join('stores', 'stores_comments.store_id', '=', 'stores.id')
            ->first();
        return view('mahjongs.commentdetail', compact('comments', 'user_comment'));
    }

    // コメント投稿
    public function create(Request $request)
    {
        $comment = Comment::create($request->all());
        UsersComment::create([
            'user_id' => Auth::id(),
            'comment_id' => $comment->id,
        ]);
        StoresComment::create([
            'store_id' => $request->store_id,
            'comment_id' => $comment->id,
        ]);
        $mahjongs = DB::table('comments')->orderBy('comments.created_at', 'desc')
            ->join('stores_comments', 'comments.id', '=', 'stores_comments.comment_id')
            ->join('stores', 'stores_comments.store_id', '=', 'stores.id')
            ->limit(5)->get();

        $favorite = DB::table('goods')->where('user_id', Auth::id())->get();

        return view('mahjongs.main', compact('mahjongs', 'favorite'));
    }

    // コメント編集
    public function commentEdit(Request $request)
    {
        $mahjongs = $request;
        return view('mahjongs.commentedit', compact('mahjongs'));
    }

    // マイコメント


    // mycommentlist
    public function mycommentlist()
    {
        $mahjongs = Comment::all();
        return view('mahjongs.mycommentlist', compact('mahjongs'));
    }


    // 情報更新
    public function update(Request $request)
    {
        $mahjongs = Comment::find($request->id);
        $mahjongs->update([
            "title" => $request['title'],
            "comment" => $request['comment'],
            "recommended" => $request['recommended'],
            "point_of_concern" => $request['point_of_concern'],
            "review" => $request['review'],
            "updated_at" => Carbon::now(),
        ]);
        return redirect()->route('mahjongs.main')->with('success');
    }

        // 店舗コメント削除
        public function delete(Request $request)
        {
            $mahjong = Comment::find($request->id);
            $mahjong->delete();
    
            $mahjongs = DB::table('comments')->orderBy('comments.created_at', 'desc')
                ->join('stores_comments', 'comments.id', '=', 'stores_comments.comment_id')
                ->join('stores', 'stores_comments.store_id', '=', 'stores.id')
                ->simplePaginate(5);
    
            $favorite = DB::table('goods')->where('user_id', Auth::id())->get();
            return view('mahjongs.main', compact('mahjongs', 'favorite'));
        }

        
    
}
