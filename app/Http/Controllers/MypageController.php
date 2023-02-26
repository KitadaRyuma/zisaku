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

class MypageController extends Controller
{
    public function index(Request $request)
    {
        $comments =  DB::table('comments')->where('comments.id', $request->id)
            ->join('stores_comments', 'comments.id', '=', 'stores_comments.comment_id')
            ->join('stores', 'stores_comments.store_id', '=', 'stores.id')
            ->first();
        return view('mahjongs.commentdetail', compact('comments'));
    }
}
