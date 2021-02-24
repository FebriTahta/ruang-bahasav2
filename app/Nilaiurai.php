<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilaiurai extends Model
{
    protected $fillable = [
        'user_id','profile_id','uraian_id','soalurai_id','jawaburai_id','nilaiurai'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function uraian()
    {
        return $this->belongsTo(Uraian::class);
    }

    public function soalurai()
    {
        return $this->belongsTo(Soalurai::class);
    }

    public function jawaburai()
    {
        return $this->belongsTo(Jawaburai::class);
    }
}
