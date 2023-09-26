<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiayaPerdin extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];
    protected $with = ['author', 'area', 'dari', 'ke', 'transport', 'harian'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author');
    }

    public function area()
    {
        return $this->belongsTo(JenisPerdin::class, 'area');
    }

    public function dari()
    {
        return $this->belongsTo(KotaKabupaten::class, 'dari');
    }

    public function ke()
    {
        return $this->belongsTo(KotaKabupaten::class, 'ke');
    }

    public function transport()
    {
        return $this->belongsTo(UangTransport::class, 'transport');
    }

    public function harian()
    {
        return $this->belongsTo(UangHarian::class, 'harian');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['area.nama', 'dari.nama', 'ke.nama']
            ]
        ];
    }
}
