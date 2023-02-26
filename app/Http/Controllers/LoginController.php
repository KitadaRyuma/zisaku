<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\SignupRequest;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Support\Facades\Storage;
use InterventionImage;



class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->password) {
            User::create(array_merge(
                $request->all(),
                ['password' => Hash::make($request->password)]
            ));
        }

        // return redirect()->route('mahjongs.index')->with('success');


        return view('mahjongs.login');

    }

    /**
     * 認証の試行を処理
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // ユーザー情報持ってくる・確認する
            // return (Auth::user());
            return redirect()->intended('/main');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->password) {
            User::create(array_merge(
                $request->all(),
                ['password' => Hash::make($request->password)]
            ));
        } else {
            User::create($request->all());
        }

        return redirect()->route('mahjongs.index')->with('success');
    }

}
