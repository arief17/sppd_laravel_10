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
    
    public function terbilang($angka) {
        $bilangan = array(
            '',
            'satu',
            'dua',
            'tiga',
            'empat',
            'lima',
            'enam',
            'tujuh',
            'delapan',
            'sembilan',
            'sepuluh',
            'sebelas'
        );
    
        if ($angka < 12) {
            return $bilangan[$angka];
        } elseif ($angka < 20) {
            return $this->terbilang($angka - 10) . ' belas';
        } elseif ($angka < 100) {
            return $this->terbilang($angka / 10) . ' puluh ' . $this->terbilang($angka % 10);
        } elseif ($angka < 200) {
            return 'seratus ' . $this->terbilang($angka - 100);
        } elseif ($angka < 1000) {
            return $this->terbilang($angka / 100) . ' ratus ' . $this->terbilang($angka % 100);
        } elseif ($angka < 2000) {
            return 'seribu ' . $this->terbilang($angka - 1000);
        } elseif ($angka < 1000000) {
            return $this->terbilang($angka / 1000) . ' ribu ' . $this->terbilang($angka % 1000);
        } elseif ($angka < 1000000000) {
            return $this->terbilang($angka / 1000000) . ' juta ' . $this->terbilang($angka % 1000000);
        } elseif ($angka < 1000000000000) {
            return $this->terbilang($angka / 1000000000) . ' miliar ' . $this->terbilang($angka % 1000000000);
        } elseif ($angka < 1000000000000000) {
            return $this->terbilang($angka / 1000000000000) . ' triliun ' . $this->terbilang($angka % 1000000000000);
        } elseif ($angka < 1000000000000000000) {
            return $this->terbilang($angka / 1000000000000000) . ' kuadriliun ' . $this->terbilang($angka % 1000000000000000);
        } elseif ($angka < 1000000000000000000000) {
            return $this->terbilang($angka / 1000000000000000000) . ' kuintiliun ' . $this->terbilang($angka % 1000000000000000000);
        } else {
            return 'Angka terlalu besar';
        }
    }
    
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
