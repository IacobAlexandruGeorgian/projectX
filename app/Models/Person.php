<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Person extends Model
{
    use HasFactory;
    protected $table = 'people';
    protected $fillable = ['id', 'name', 'license', 'wl_status', 'link'];

    public function attribute()
    {
        return $this->hasOne(Attribute::class, 'person_id', 'id');
    }

    public function statistic()
    {
        return $this->hasOne(Statistic::class, 'person_id', 'id');
    }

    public function aliases()
    {
        return $this->hasMany(Alias::class, 'person_id', 'id');
    }

    public function thumbnails()
    {
        return $this->hasMany(Thumbnail::class, 'person_id', 'id');
    }

    public function setThumbnailInfo($type)
    {
        $thumbnail = Cache::get('image_' . $this->id . '_' . $type);
        if ($thumbnail) {
            $this->width = $thumbnail->width;
            $this->height = $thumbnail->height;
            $this->image_url = $thumbnail->urls[0];
        }
    }
}
