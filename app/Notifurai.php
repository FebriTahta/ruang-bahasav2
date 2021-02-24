<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifurai extends Model
{
    protected $fillable = [
        'user_id','profile_id','uraian_id','kursus_id','notif','dinilai'
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

    public function kursus()
    {
        return $this->belongsTo(Kursus::class);
    }
}
