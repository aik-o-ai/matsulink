<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\FestivalImage;
use App\Models\Video;

class MyPageController extends Controller
{
    /**
     * ユーザーのマイページ表示
     */
    public function index()
    {
        //現在ログイン中のユーザー
        $user = Auth::user();

        //ユーザーが投稿した祭りイベント一覧
        $events = Event::where('user_id', $user->id)->orderBy('start_date', 'desc')->get();

        //ユーザーが投稿した写真一覧
        $images = FestivalImage::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        //ユーザーが投稿した動画一覧
        $videos = Video::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();


        //マイページビューへデータを渡す
        return view('mypage.index', compact('user', 'events', 'images',  'videos'));
    }
}
