<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class BiayaPerdin extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $guarded = ['id'];
    protected $with = ['author', 'area', 'dari', 'ke', 'transport', 'harian'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(JenisPerdin::class,  'area_id');
    }

    public function dari(): BelongsTo
    {
        return $this->belongsTo(KotaKabupaten::class, 'dari_id');
    }

    public function ke(): BelongsTo
    {
        return $this->belongsTo(KotaKabupaten::class, 'ke_id');
    }

    public function transport(): BelongsTo
    {
        return $this->belongsTo(UangTransport::class, 'transport_id');
    }

    public function harian(): BelongsTo
    {
        return $this->belongsTo(UangHarian::class, 'harian_id');
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
