<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'logo', 'description', 'address', 'locale_id', 'contact', 'email', 'site', 'linkedin'
    ];

    public function internships()
    {
        return $this->hasMany(Internship::class);
    }

    public function locale()
    {
        return $this->belongsTo(Locale::class);
    }
}
