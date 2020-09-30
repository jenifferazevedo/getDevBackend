<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'name'
    ];

    public function internships()
    {
        return $this->hasMany(Internship::class);
    }
}
