<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soalurai extends Model
{
    protected $fillable = [
        'uraian_id','soaluraian'
    ];

    public function uraian()
    {
        return $this->belongsTo(Uraian::class);
    }

    public function jawaburai()
    {
        return $this->hasMany(Jawaburai::class);
    }

    public function nilaiurai()
    {
        return $this->hasMany(Nilaiurai::class);
    }
}
