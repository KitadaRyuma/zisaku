<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\NewStoreRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahjongs = User::all();
        return view('mahjongs.store', compact('mahjongs'));
    }


    // 検索結果ページ
    public function storesearch()
    {
        $mahjongs = Store::all();
        return view('mahjongs.storesearch', compact('mahjongs'));
    }

    public function confirm(Request $request)
    {
        session([
            'name' => $request['name'],
            'address' => $request['address'],
            'tel' => $request['tel'],
            'station' => $request['station'],
            'business_hours' => $request['business_hours'],
        ]);
        $inputs = $request->all();
        return view('mahjongs.storesearch', compact('inputs'));
    }


    public function store(Request $request)
    {
        $mahjongs = DB::table('stores')->where('area_id', $request['store'])->simplePaginate(5);
        $area = $request['store'];
        return view('mahjongs.storelist', compact('mahjongs', 'area'));
    }

    public function storeDetail(Request $request)
    {
        $store_id = $request->id;
        $mahjongs = Store::where('id', $store_id)->first();
        $comments =  DB::table('stores_comments')->where('store_id', $store_id)->orderBy('stores_comments.created_at', 'desc')
            ->join('comments', 'stores_comments.comment_id', '=', 'comments.id')
            ->join('stores', 'stores_comments.store_id', '=', 'stores.id')
            ->get();
        return view('mahjongs.store', compact('mahjongs', 'comments', 'store_id'));
    }

    // 編集処理
    public function show(Request $request)
    {
        $store = Store::find($request->id)->first();
        return view('mahjongs.storeedit', compact('store'));
    }

    public function valshow()
    {
        return view('mahjongs.storeedit');
    }

    // 情報更新
    public function update(Request $request)
    {
        $mahjong = Store::find($request->id);

        $mahjong->update([
            "address" => $request['address'],
            "tel" => $request['tel'],
            "station" => $request['station'],
            "business_hours" => $request['business_hours'],
            "updated_at" => Carbon::now(),
        ]);
        return redirect()->route('mahjongs.main')->with('success');
    }

    // 店舗削除
    public function delete(Request $request)
    {
        $mahjong = Store::find($request->id);
        $mahjong->delete();

        $mahjongs = DB::table('comments')->orderBy('comments.created_at', 'desc')
            ->join('stores_comments', 'comments.id', '=', 'stores_comments.comment_id')
            ->join('stores', 'stores_comments.store_id', '=', 'stores.id')
            ->simplePaginate(5);

        $favorite = DB::table('goods')->where('user_id', Auth::id())->get();
        return view('mahjongs.main', compact('mahjongs', 'favorite'));
    }

    //     店舗追加
    public function storeadd(NewStoreRequest $request)
    {
        Store::create($request->all());
        $table = DB::table('comments');
        $mahjongs = $table->orderBy('comments.created_at', 'desc')
            ->join('stores_comments', 'comments.id', '=', 'stores_comments.comment_id')
            ->join('stores', 'stores_comments.store_id', '=', 'stores.id')
            ->limit(5)->get();

        $favorite = DB::table('goods')->where('user_id', Auth::id())->get();
        return view('mahjongs.main', compact('mahjongs', 'favorite'));
    }


    //     店舗確認
    public function storeconfirm(NewStoreRequest $request)
    {
        session([
            "area_id" => $request['area_id'],
            "name" => $request['name'],
            "address" => $request['address'],
            "tel" => $request['tel'],
            "station" => $request['station'],
            "business_hours" => $request['business_hours'],
            "updated_at" => Carbon::now(),
        ]);
        $inputs = $request->all();

        return view('mahjongs.storeconfirm', compact('inputs'));
    }

    public function createindex()
    {
        return view('mahjongs.storeadd');
    }

}
