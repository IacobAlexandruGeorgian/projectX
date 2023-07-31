<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'hair_color',
        'ethnicity',
        'tattoos',
        'piercings',
        'breast_size',
        'breast_type',
        'gender',
        'orientation',
        'age'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }
}
