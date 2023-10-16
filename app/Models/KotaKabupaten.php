<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class KotaKabupaten extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $guarded = ['id'];
    protected $with = ['author'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }

    public function biaya_perdins_dari(): HasMany
    {
        return $this->hasMany(BiayaPerdin::class, 'dari_id');
    }

    public function biaya_perdins_ke(): HasMany
    {
        return $this->hasMany(BiayaPerdin::class, 'ke_id');
    }

    public function data_perdins_kedudukan(): HasMany
    {
        return $this->hasMany(DataPerdin::class, 'kedudukan_id');
    }

    public function data_perdins_tujuan(): HasMany
    {
        return $this->hasMany(DataPerdin::class, 'tujuan_id');
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
