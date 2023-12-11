<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class KwitansiPerdin extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $guarded = ['id'];
    protected $with = ['author'];
    
    public function getTotalUangHarianAttribute()
    {
        return $this->pegawais->sum('pivot.uang_harian');
    }
    
    public function getTotalUangTransportAttribute()
    {
        return $this->pegawais->sum('pivot.uang_transport');
    }
    
    public function getTotalUangTiketAttribute()
    {
        return $this->pegawais->sum('pivot.uang_tiket');
    }
    
    public function getTotalUangPenginapanAttribute()
    {
        return $this->pegawais->sum('pivot.uang_penginapan');
    }
    
    public function getTotalSemuaAttribute()
    {
        return $this->getTotalUangHarianAttribute() +
            $this->getTotalUangTransportAttribute() +
            $this->getTotalUangTiketAttribute() +
            $this->getTotalUangPenginapanAttribute();
    }
    
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
    
    public function pegawais()
    {
        return $this->belongsToMany(Pegawai::class, 'kwitansi_pegawai', 'kwitansi_perdin_id', 'pegawai_id')
        ->withPivot('uang_harian', 'uang_transport', 'uang_tiket', 'uang_penginapan');
    }
    
    public function data_perdin(): HasOne
    {
        return $this->hasOne(DataPerdin::class, 'laporan_perdin_id');
    }
}
