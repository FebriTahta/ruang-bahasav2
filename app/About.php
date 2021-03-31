<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = ['user_id','judul','konten','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
