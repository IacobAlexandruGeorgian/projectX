<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'subscriptions',
        'monthly_searches',
        'views',
        'videos_count',
        'premium_videos_count',
        'white_label_video_count',
        'rank',
        'rank_premium',
        'rank_wl'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }
}
