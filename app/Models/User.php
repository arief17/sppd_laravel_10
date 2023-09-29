<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];
    protected $with = ['level_admin', 'seksi', 'bidang'];

    public function level_admin()
    {
        return $this->belongsTo(LevelAdmin::class, 'level_admin_id', 'level_admin');
    }
    
    public function seksi_authors()
    {
        return $this->hasMany(Bidang::class, 'author');
    }
    
    public function seksi()
    {
        return $this->belongsTo(Bidang::class, 'seksi_id', 'seksi');
    }

    public function bidang_authors()
    {
        return $this->hasMany(Bidang::class, 'author');
    }
    
    public function bidang()
    {
        return $this->belongsTo(Bidang::class, 'bidang_id', 'bidang');
    }

    public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class, 'kegiatan');
    }

    public function pegawais()
    {
        return $this->hasMany(Pegawai::class, 'pegawai');
    }

    public function tanda_tangans()
    {
        return $this->hasMany(TandaTangan::class, 'tanda_tangan');
    }

    public function alat_angkuts()
    {
        return $this->hasMany(AlatAngkut::class, 'author');
    }

    public function jabatans()
    {
        return $this->hasMany(Jabatan::class, 'author');
    }

    public function ketentuans()
    {
        return $this->hasMany(Ketentuan::class, 'author');
    }

    public function golongans()
    {
        return $this->hasMany(Golongan::class, 'author');
    }

    public function jenis_perdins()
    {
        return $this->hasMany(JenisPerdin::class, 'author');
    }

    public function provinsis()
    {
        return $this->hasMany(Provinsi::class, 'author');
    }

    public function kota_kabupatens()
    {
        return $this->hasMany(KotaKabupaten::class, 'author');
    }

    public function uang_harians()
    {
        return $this->hasMany(UangHarian::class, 'author');
    }

    public function uang_transports()
    {
        return $this->hasMany(UangTransport::class, 'author');
    }

    public function biaya_perdins()
    {
        return $this->hasMany(BiayaPerdin::class, 'author');
    }

    public function getRouteKeyName()
    {
        return 'username';
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
