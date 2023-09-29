<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BiayaPerdin extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $guarded = ['id'];
    protected $with = ['author', 'area', 'dari', 'ke', 'transport', 'harian'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'author');
    }

    public function area()
    {
        return $this->belongsTo(JenisPerdin::class, 'jenis_perdin_id', 'area');
    }

    public function dari()
    {
        return $this->belongsTo(KotaKabupaten::class, 'kota_kabupaten_id', 'dari');
    }

    public function ke()
    {
        return $this->belongsTo(KotaKabupaten::class, 'kota_kabupaten_id', 'ke');
    }

    public function transport()
    {
        return $this->belongsTo(UangTransport::class, 'uang_transport_id', 'transport');
    }

    public function harian()
    {
        return $this->belongsTo(UangHarian::class, 'uang_harian_id', 'harian');
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
