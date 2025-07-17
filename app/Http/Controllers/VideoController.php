<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\Event;


class VideoController extends Controller
{
    // 動画一覧表示
    public function index($event_id)
    {
        $event = Event::findOrFail($event_id);
        $videos = Video::where('event_id', $event_id)->get();
        return view('videos.index', compact('event', 'videos'));
    }


    // 動画追加画面の表示
    public function create($event_id)
    {
        return view('videos.create', compact('event_id'));
    }

    // 動画の保存処理
    public function store(Request $request, $event_id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'video_url' => 'required|url',
        ]);

        Video::create([
            'event_id' => $event_id,
            'title' => $request->title,
            'video_url' => $request->video_url,
        ]);

        return redirect()->route('videos.index', ['event' => $event_id])
            ->with('success', '動画を追加しました。');
    }

    // 動画の削除
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $event_id = $video->event_id;
        $video->delete();

        return redirect()->route('videos.index', ['event' => $event_id])
            ->with('success', '動画を削除しました。');
    }
}
