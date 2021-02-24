<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaburai extends Model
{
    protected $fillable = [
        'user_id','profile_id','uraian_id','soalurai_id','jawabanuraian'
    ];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function soalurai()
    {
        return $this->belongsTo(Soalurai::class);
    }

    public function uraian()
    {
        return $this->belongsTo(Uraian::class);
    }

    public function nilaiurai()
    {
        return $this->hasMany(Nilaiurai::class);
    }    
}
