<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataAnggaran extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function uang_masuks(): HasMany
    {
        return $this->hasMany(UangMasuk::class, 'anggaran_slug', 'slug');
    }

    public function uang_keluars(): HasMany
    {
        return $this->hasMany(UangKeluar::class, 'anggaran_slug', 'slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
