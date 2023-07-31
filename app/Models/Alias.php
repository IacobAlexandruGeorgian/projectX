<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alias extends Model
{
    use HasFactory;

    protected $table = 'aliases';

    protected $fillable = ['person_id', 'name'];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }
}
