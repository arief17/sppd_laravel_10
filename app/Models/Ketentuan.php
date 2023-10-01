<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ketentuan extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $guarded = ['id'];
    protected $with = ['author', 'kegiatan', 'pptk', 'bendahara', 'pelaksana_administrasi'];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function kegiatan(): BelongsTo
    {
        return $this->belongsTo(Kegiatan::class, 'kegiatan_id');
    }

    public function pptk(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pptk_id');
    }

    public function bendahara(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'bendahara_id');
    }

    public function pelaksana_administrasi(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pelaksana_administrasi_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['pptk.nama', 'bendahara.nama', 'pelaksana_administrasi.nama']
            ]
        ];
    }
}
