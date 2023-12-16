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
    protected $with = ['author', 'kegiatan_sub', 'pptk'];
    
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function kegiatan_sub(): BelongsTo
    {
        return $this->belongsTo(KegiatanSub::class, 'kegiatan_sub_id');
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
