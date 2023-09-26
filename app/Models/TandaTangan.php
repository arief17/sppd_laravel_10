<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TandaTangan extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['author', 'pegawai', 'jabatan'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['pegawai.nama', 'jabatan.nama']
            ]
        ];
    }
}
