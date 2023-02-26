<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\EditRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;




class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahjongs = User::oldest()->get();
        return view('mahjongs.signupconfirm', compact('mahjongs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        $mahjongs = User::oldest()->get();
        return view('mahjongs.signup', compact('mahjongs'));
    }

    public function confirm(SignupRequest $request)
    {
        session([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => $request['password'],
            'gender' => $request['gender'],
            'residence' => $request['residence'],
        ]);
        $inputs = $request->all();

        return view('mahjongs.signupconfirm', compact('inputs'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function forgotpass()
    {
        $mahjongs = User::oldest()->get();
        return view('mahjongs.passforget', compact('mahjongs'));
    }

    public function change_complete(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();
        //パスワード変更処理
        $user->fill([
            'password' => Hash::make($request->input('password'))
        ])->save();
        return view('mahjongs.login', compact('user'));
    }

    // マイアカウント
    // マイページ
    public function mypage()
    {
        $mahjongs = User::all();
        return view('mahjongs.mypage', compact('mahjongs'));
    }

    // メインページ→マイページに情報持ってくる
    public function information()
    {
        $mahjongs = Auth::user();
        $comments =  DB::table('users_comments')->where('users_comments.user_id', Auth::id())
            ->join('comments', 'users_comments.comment_id', '=', 'comments.id')
            ->join('stores_comments', 'comments.id', '=', 'stores_comments.comment_id')
            ->join('stores', 'stores_comments.store_id', '=', 'stores.id')
            ->get();
        $favorite_comments =  DB::table('goods')->where('goods.user_id', Auth::id())
            ->join('comments', 'comments.id', '=', 'goods.comment_id')
            ->get();
        return view('mahjongs.mypage', compact('mahjongs', 'comments','favorite_comments'));
    }

    // マイページ編集
    public function mypageedit()
    {
        $mahjongs = User::all();
        return view('mahjongs.mypageedit', compact('mahjongs'));
    }

    // 編集処理
    public function show()
    {
        $user = User::find(Auth::id());
        return view('mahjongs.mypageedit', compact('user'));
    }

    // 情報更新
    public function update(EditRequest $request)
    {
        $mahjong = User::find(Auth::id());
        $mahjong->update([
            "name" => $request['name'],
            "email" => $request['email'],
            "gender" => $request['gender'],
            "residence" => $request['residence'],
            "updated_at" => Carbon::now(),
        ]);
        return redirect()->route('mahjongs.main')->with('success');
    }

    // マイページ削除
    public function mypagedelete()
    {
        $mahjongs = User::all();
        return view('mahjongs.mypagedelete', compact('mahjongs'));
    }

    // アカウント削除(退会)
    public function delete()
    {
        $mahjong = User::find(Auth::id());
        $mahjong->delete();

        return redirect('/');
    }
    // ログアウト
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
