<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uraian extends Model
{
    protected $fillable = [
        'user_id','kelas_id','mapel_id','judul','keterangan','tgls','tgle','slug'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    public function soalurai()
    {
        return $this->hasMany(Soalurai::class);
    }

    public function kursus()
    {
        return $this->belongsToMany(Kursus::class);
    }

    public function nilaiurai()
    {
        return $this->hasMany(Nilaiurai::class);
    }

    public function jawaburai()
    {
        return $this->hasMany(Jawaburai::class);
    }

    public function notifurai()
    {
        return $this->hasMany(Notifurai::class);
    }
}
