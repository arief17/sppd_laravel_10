<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class KotaKabupaten extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $guarded = ['id'];
    protected $with = ['author', 'provinsi', 'jenis_perdin'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function provinsi(): BelongsTo
    {
        return $this->belongsTo(Provinsi::class, 'provinsi_id');
    }

    public function jenis_perdin(): BelongsTo
    {
        return $this->belongsTo(JenisPerdin::class, 'jenis_perdin_id');
    }

    public function uang_harians(): MorphMany
    {
        return $this->morphMany(UangHarian::class, 'wilayah');
    }

    public function uang_transports(): MorphMany
    {
        return $this->morphMany(UangTransport::class, 'wilayah');
    }

    public function uang_penginapans(): MorphMany
    {
        return $this->morphMany(UangPenginapan::class, 'wilayah');
    }

    public function data_perdins_kedudukan(): HasMany
    {
        return $this->hasMany(DataPerdin::class, 'kedudukan_id');
    }

    public function data_perdins_tujuan(): MorphMany
    {
        return $this->morphMany(DataPerdin::class, 'tujuan');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama',
                'includeTrashed' => true,
            ]
        ];
    }
}
