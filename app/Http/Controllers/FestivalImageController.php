<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FestivalImage;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Cloudinary\Cloudinary; //use宣言

class FestivalImageController extends Controller
{
    public function create($event_id)
    {
        return view('festival_images.create', compact('event_id'));  //create.blade.phpを表示
    }

    public function store(Request $request, FestivalImage $festivalImage)
    {


        // バリデーション
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:4096',
            'event_id' => 'required|exists:events,id',

        ]);
        // Cloudinaryアップロード
        $cloudinary = new Cloudinary([
            'cloud' => [
                'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
                'api_key'    => env('CLOUDINARY_API_KEY'),
                'api_secret' => env('CLOUDINARY_API_SECRET'),
            ],
        ]);

        // 画像をアップロード
        $uploaded = $cloudinary->uploadApi()->upload($request->file('image')->getRealPath());
        $image_url = $uploaded['secure_url'];

        // 入力値の組み立て
        $input = $request->only(['title']);
        $input['event_id'] = $request->input('event_id');
        $input['user_id'] = auth()->id();
        $input['image_url'] = $image_url;

        //モデルに保存
        $festivalImage = new FestivalImage();
        $festivalImage->event_id = $request->input('event_id'); // イベントID
        $festivalImage->user_id = Auth::id(); // ログインユーザー
        $festivalImage->title = $request->input('title');
        $festivalImage->image_url = $image_url;
        $festivalImage->fill($input)->save();


        // 画像一覧ページへリダイレクト（例: /events/{event_id}/images）
        return redirect()->route('events.images.index', ['event_id' => $request->input('event_id')])
            ->with('success', '画像をアップロードしました');
    }
    public function index($event_id)
    {
        $event = Event::findOrFail($event_id);
        $images = FestivalImage::where('event_id', $event_id)->get();

        return view('festival_images.index', compact('event', 'images'));
    }
    public function destroy($id)
    {
        $image = FestivalImage::findOrFail($id);

        // ログインユーザー以外が削除しようとしたら弾く
        if ($image->user_id !== auth()->id()) {
            abort(403, 'Unauthorized');
        }

        $image->delete();

        return redirect()->route('mypage')->with('success', '画像を削除しました。');
    }
}
