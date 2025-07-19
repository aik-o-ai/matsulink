<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Http\JsonResponse;

class EventController extends Controller
{
    public function create()
    {
        return view('events.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'prefecture' => 'required|string|max:50',
            'location' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);
        Event::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'prefecture' => $request->prefecture,
            'location' => $request->location,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);
        return redirect()->route('events.byDate', ['date' => $request->start_date])
            ->with('success', 'イベントを投稿しました');
    }

    //日付別にイベントを取得
    public function listByDate($date)
    {
        $events = Event::where('start_date', $date)->get();
        return view('events.by_date', compact('events', 'date'));
    }

    //イベント詳細ページ
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    //カレンダー表示
    public function calendar()
    {
        return view('calendars.calendar');
    }
    //カレンダーにイベントを表示
    public function get(): JsonResponse
    {
        $events = Event::select('id', 'title', 'start_date as start', 'end_date as end')->get();

        return response()->json($events);
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        // 自分の投稿か確認（不正アクセス防止）
        if ($event->user_id !== auth()->id()) {
            abort(403);
        }
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        if ($event->user_id !== auth()->id()) {
            abort(403);
        }
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'prefecture' => 'required|string',
            'location' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);
        $event->update($request->only([
            'title',
            'description',
            'start_date',
            'end_date',
            'prefecture',
            'location',
            'latitude',
            'longitude',
        ]));

        return redirect()->route('mypage')->with('success', 'イベントを更新しました。');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->user_id !== auth()->id()) {
            abort(403);
        }

        $event->delete();

        return redirect()->route('mypage')->with('success', 'イベントを削除しました。');
    }

    //詳細ページからカレンダーに戻る
    public function showCalendar()
    {
        return view('calendars.calendar');
    }
}
