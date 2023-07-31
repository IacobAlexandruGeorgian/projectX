<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thumbnail extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'height',
        'width',
        'type',
        'image_url'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }
}
