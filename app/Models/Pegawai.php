<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $guarded = ['id'];
    protected $with = ['author', 'eselon', 'jabatan'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function eselon(): BelongsTo
    {
        return $this->belongsTo(Golongan::class, 'eselon_id');
    }

    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    public function ketentuan_pptks(): HasMany
    {
        return $this->hasMany(Ketentuan::class, 'pptk_id');
    }

    public function ketentuan_bendaharas(): HasMany
    {
        return $this->hasMany(Ketentuan::class, 'bendahara_id');
    }

    public function ketentuan_pelaksana_administrasis(): HasMany
    {
        return $this->hasMany(Ketentuan::class, 'pelaksana_administrasi_id');
    }

    public function tanda_tangans(): HasMany
    {
        return $this->hasMany(TandaTangan::class, 'pegawai_id');
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
