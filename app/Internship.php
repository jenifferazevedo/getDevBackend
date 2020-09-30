<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internship extends Model
{
    protected $fillable = [
        'title', 'description', 'area_id', 'type_id', 'technologies', 'remote', 'company_id', 'locale_id', 'contact', 'email'
    ];

    public function locale()
    {
        return $this->belongsTo(Locale::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
