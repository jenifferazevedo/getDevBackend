<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'description', 'address', 'city', 'contact', 'email', 'site', 'linkedin'
    ];

    public function internships()
    {
        return $this->hasMany(Internship::class);
    }
}
