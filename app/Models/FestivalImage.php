<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FestivalImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'user_id',
        'title',
        'image_url',
    ];

    public function event()
    {
        return $this->belongTo(Event::class);
    }

    public function user()
    {
        return $this->belongTo(User::class);
    }
}
