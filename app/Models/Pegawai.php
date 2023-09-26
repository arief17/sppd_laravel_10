<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['author'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function ketentuan_pptks()
    {
        return $this->hasMany(Ketentuan::class, 'pptk');
    }

    public function ketentuan_bendaharas()
    {
        return $this->hasMany(Ketentuan::class, 'bendahara');
    }

    public function ketentuan_pelaksana_administrasis()
    {
        return $this->hasMany(Ketentuan::class, 'pelaksana_administrasi');
    }

    public function tanda_tangans()
    {
        return $this->hasMany(TandaTangan::class, 'pegawai');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
}
