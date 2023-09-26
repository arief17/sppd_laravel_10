<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketentuan extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['author', 'kegiatan', 'pptk', 'bendahara', 'pelaksana_administrasi'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan');
    }

    public function pptk()
    {
        return $this->belongsTo(Pegawai::class, 'pptk');
    }

    public function bendahara()
    {
        return $this->belongsTo(Pegawai::class, 'bendahara');
    }

    public function pelaksana_administrasi()
    {
        return $this->belongsTo(Pegawai::class, 'pelaksana_administrasi');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['pptk.nama', 'bendahara.nama', 'pelaksana_administrasi']
            ]
        ];
    }
}
