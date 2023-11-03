<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\AlatAngkut;
use App\Models\BiayaPerdin;
use App\Models\Bidang;
use App\Models\Golongan;
use App\Models\Jabatan;
use App\Models\JenisPerdin;
use App\Models\Kegiatan;
use App\Models\Ketentuan;
use App\Models\KotaKabupaten;
use App\Models\LevelAdmin;
use App\Models\Pegawai;
use App\Models\Provinsi;
use App\Models\Ruang;
use App\Models\Seksi;
use App\Models\TandaTangan;
use App\Models\UangHarian;
use App\Models\UangTransport;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        LevelAdmin::create([
            'nama' => 'Admin',
            'slug' => 'admin',
        ]);
        LevelAdmin::create([
            'nama' => 'Operator',
            'slug' => 'operator',
        ]);
        LevelAdmin::create([
            'nama' => 'Pegawai',
            'slug' => 'pegawai',
        ]);

        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'level_admin_id' => 1,
        ]);
        User::create([
            'username' => 'ADM-SEKSI-1',
            'password' => bcrypt('admin'),
            'level_admin_id' => 2,
        ]);
        
        Bidang::create([
            'nama' => 'BIDANG BINA MARGA',
            'slug' => 'bidang-bina-marga',
            'jenis' => 'BIDANG',
            'author_id' => 1,
        ]);
        Bidang::create([
            'nama' => 'BIDANG JASA KONSTRUKSI',
            'slug' => 'bidang-jasa-konstruksi',
            'jenis' => 'BIDANG',
            'author_id' => 1,
        ]);

        Seksi::create([
            'nama' => 'Koordinasi dan Sinkronisasi Perencanaan Tata Ruang',
            'slug' => 'koordinasi-dan-sinkronisasi-perencanaan-tata-ruang',
            'bidang_id' => 1,
            'author_id' => 1,
        ]);
        Seksi::create([
            'nama' => 'PELAKSANAAN PJPA',
            'slug' => 'pelaksanaan-pjpa',
            'bidang_id' => 2,
            'author_id' => 1,
        ]);

        Kegiatan::create([
            'nama' => 'Koordinasi dan Konsultasi ke Dalam dan Keluar Daerah pada UPTD Pengelolaan Daerah Aliran Sungai Cidurian-Cisadane',
            'slug' => 'koordinasi-dan-konsultasi-ke-dalam-dan-keluar-daerah-pada-uptd-pengelolaan-daerah-aliran-sungai-cidurian-cisadane',
            'author_id' => 1,
        ]);
        Kegiatan::create([
            'nama' => 'Koordinasi dan Konsultasi ke Dalam dan Keluar Daerah pada UPTD Pengelolaan Jalan Dan Jembatan Tangerang',
            'slug' => 'koordinasi-dan-konsultasi-ke-dalam-dan-keluar-daerah-pada-uptd-pengelolaan-jalan-dan-jembatan-tangerang',
            'author_id' => 1,
        ]);

        JenisPerdin::create([
            'nama' => 'Dalam Daerah',
            'slug' => 'dalam-daerah',
            'author_id' => 1,
        ]);
        JenisPerdin::create([
            'nama' => 'Luar Daerah (DKI dan JABAR)',
            'slug' => 'luar-daerah-(dki-dan-jabar)',
            'author_id' => 1,
        ]);
        JenisPerdin::create([
            'nama' => 'Luar Daerah (Selain DKI dan JABAR)',
            'slug' => 'luar-daerah-(selain-dki-dan-jabar)',
            'author_id' => 1,
        ]);

        Provinsi::create([
            'nama' => 'ACEH',
            'slug' => 'aceh',
            'author_id' => 1,
        ]);
        Provinsi::create([
            'nama' => 'BALI',
            'slug' => 'bali',
            'author_id' => 1,
        ]);
        Provinsi::create([
            'nama' => 'BANGKA BELITUNG',
            'slug' => 'bangka-belitung',
            'author_id' => 1,
        ]);

        KotaKabupaten::create([
            'nama' => 'Ambon',
            'slug' => 'ambon',
            'provinsi_id' => 1,
            'author_id' => 1,
        ]);
        KotaKabupaten::create([
            'nama' => 'Balikpapan',
            'slug' => 'balikpapan',
            'provinsi_id' => 2,
            'author_id' => 1,
        ]);
        KotaKabupaten::create([
            'nama' => 'Banda Aceh',
            'slug' => 'banda-aceh',
            'provinsi_id' => 3,
            'author_id' => 1,
        ]);

        UangHarian::create([
            'keterangan' => 'U Harian Dinas luar',
            'slug' => 'u-harian-dinas-luar',
            'eselon_i' => '150000',
            'eselon_ii' => '150000',
            'eselon_iii' => '150000',
            'eselon_iv' => '150000',
            'golongan_iv' => '150000',
            'golongan_iii' => '150000',
            'golongan_ii' => '150000',
            'golongan_i' => '150000',
            'author_id' => 1,
        ]);
        UangHarian::create([
            'keterangan' => 'U Harian Dinas Luar (Kunjungan Kerja)',
            'slug' => 'u-harian-dinas-luar-(kunjungan-kerja)',
            'eselon_i' => '150000',
            'eselon_ii' => '150000',
            'eselon_iii' => '150000',
            'eselon_iv' => '150000',
            'golongan_iv' => '150000',
            'golongan_iii' => '150000',
            'golongan_ii' => '150000',
            'golongan_i' => '150000',
            'author_id' => 1,
        ]);

        UangTransport::create([
            'keterangan' => 'Kategori I',
            'slug' => 'kategori-i',
            'eselon_i' => '550000',
            'eselon_ii' => '520000',
            'eselon_iii' => '490000',
            'eselon_iv' => '450000',
            'golongan_iv' => '400000',
            'golongan_iii' => '400000',
            'golongan_ii' => '400000',
            'golongan_i' => '400000',
            'author_id' => 1,
        ]);
        UangTransport::create([
            'keterangan' => 'Kategori II',
            'slug' => 'kategori-ii',
            'eselon_i' => '490000',
            'eselon_ii' => '460000',
            'eselon_iii' => '430000',
            'eselon_iv' => '390000',
            'golongan_iv' => '350000',
            'golongan_iii' => '350,000',
            'golongan_ii' => '350,000',
            'golongan_i' => '350,000',
            'author_id' => 1,
        ]);

        BiayaPerdin::create([
            'slug' => 'biaya-perdin-1',
            'area_id' => 1,
            'dari_id' => 1,
            'ke_id' => 1,
            'transport_id' => 1,
            'harian_id' => 1,
            'author_id' => 1,
        ]);
        BiayaPerdin::create([
            'slug' => 'biaya-perdin-2',
            'area_id' => 2,
            'dari_id' => 2,
            'ke_id' => 2,
            'transport_id' => 2,
            'harian_id' => 2,
            'author_id' => 2,
        ]);

        Golongan::create([
            'nama' => 'Eselon I',
            'slug' => 'eselon-i',
            'author_id' => 1,
        ]);
        Golongan::create([
            'nama' => 'Eselon II',
            'slug' => 'eselon-ii',
            'author_id' => 1,
        ]);
        Golongan::create([
            'nama' => 'Eselon III',
            'slug' => 'eselon-iii',
            'author_id' => 1,
        ]);
        Golongan::create([
            'nama' => 'Eselon IV',
            'slug' => 'eselon-iv',
            'author_id' => 1,
        ]);
        Golongan::create([
            'nama' => 'Golongan IV',
            'slug' => 'golongan-iv',
            'author_id' => 1,
        ]);
        Golongan::create([
            'nama' => 'Golongan III',
            'slug' => 'golongan-iii',
            'author_id' => 1,
        ]);
        Golongan::create([
            'nama' => 'Golongan II',
            'slug' => 'golongan-ii',
            'author_id' => 1,
        ]);
        Golongan::create([
            'nama' => 'Golongan I',
            'slug' => 'golongan-i',
            'author_id' => 1,
        ]);

        Ruang::create([
            'nama' => 'I - A - Juru Muda',
            'slug' => 'i-a-juru-muda',
            'author_id' => 1,
        ]);
        Ruang::create([
            'nama' => 'I - B - Juru Muda Tk. I',
            'slug' => 'i-b-juru-muda-tk.-i',
            'author_id' => 1,
        ]);
        Ruang::create([
            'nama' => 'I - C - Juru',
            'slug' => 'i-c-juru',
            'author_id' => 1,
        ]);
        Ruang::create([
            'nama' => 'I - D - Juru Tk. I',
            'slug' => 'i-d-juru-tk.-i',
            'author_id' => 1,
        ]);
        Ruang::create([
            'nama' => 'II - A - Pengatur Muda',
            'slug' => 'ii-a-pengatur-muda',
            'author_id' => 1,
        ]);
        Ruang::create([
            'nama' => 'II - B - Pengatur Muda Tk. I',
            'slug' => 'ii-b-pengatur-muda-tk.-i',
            'author_id' => 1,
        ]);
        Ruang::create([
            'nama' => 'II - C - Pengatur',
            'slug' => 'ii-c-pengatur',
            'author_id' => 1,
        ]);
        Ruang::create([
            'nama' => 'II - D - Pengatur Tk. I',
            'slug' => 'ii-d-pengatur-tk.-i',
            'author_id' => 1,
        ]);
        Ruang::create([
            'nama' => 'III - A - Penata Muda',
            'slug' => 'iii-a-penata-muda',
            'author_id' => 1,
        ]);
        Ruang::create([
            'nama' => 'III - B - Penata Muda Tk. I',
            'slug' => 'iii-b-penata-muda-tk.-i',
            'author_id' => 1,
        ]);
        Ruang::create([
            'nama' => 'III - C - Penata',
            'slug' => 'iii-c-penata',
            'author_id' => 1,
        ]);
        Ruang::create([
            'nama' => 'III - D - Penata Tk. I',
            'slug' => 'iii-d-penata-tk.-i',
            'author_id' => 1,
        ]);
        Ruang::create([
            'nama' => 'IV - A - Pembina',
            'slug' => 'iv-a-pembina',
            'author_id' => 1,
        ]);
        Ruang::create([
            'nama' => 'IV - B - Pembina Tk. I',
            'slug' => 'iv-b-pembina-tk.-i',
            'author_id' => 1,
        ]);
        Ruang::create([
            'nama' => 'IV - C - Pembina Utama Muda',
            'slug' => 'iv-c-pembina-utama-muda',
            'author_id' => 1,
        ]);
        Ruang::create([
            'nama' => 'IV - D - Pembina Utama Madya',
            'slug' => 'iv-d-pembina-utama-madya',
            'author_id' => 1,
        ]);
        Ruang::create([
            'nama' => 'IV - E - Pembina Utama',
            'slug' => 'iv-e-pembina-utama',
            'author_id' => 1,
        ]);

        Jabatan::create([
            'nama' => 'KEPALA BIDANG',
            'slug' => 'kepala-bidang',
            'jabatan_singkat' => 'KABID',
            'author_id' => 1,
        ]);
        Jabatan::create([
            'nama' => 'KEPALA DINAS PUPR',
            'slug' => 'kepala-dinas-pupr',
            'jabatan_singkat' => 'KADIS',
            'author_id' => 1,
        ]);

        Pegawai::create([
            'nama' => 'Acep Wahidiat',
            'slug' => 'acep-wahidiat',
            'nip' => '198512142014091001',
            'email' => 'example@gmail.com',
            'no_hp' => '083812233445',
            'seksi_id' => 1,
            'golongan_id' => 1,
            'ruang_id' => 1,
            'jabatan_id' => 1,
            'pptk' => 0,
            'author_id' => 1,
        ]);
        Pegawai::create([
            'nama' => 'Adhia Muharditia, ST',
            'slug' => 'adhia-muharditia,-st',
            'nip' => '199406112019031005',
            'email' => 'examplee@gmail.com',
            'no_hp' => '0838122334455',
            'seksi_id' => 2,
            'golongan_id' => 2,
            'ruang_id' => 2,
            'jabatan_id' => 2,
            'pptk' => 1,
            'author_id' => 1,
        ]);

        TandaTangan::create([
            'slug' => 'tanda-tangan-1',
            'pegawai_id' => 1,
            'status' => 1,
            'author_id' => 1,
        ]);
        TandaTangan::create([
            'slug' => 'tanda-tangan-2',
            'pegawai_id' => 2,
            'status' => 2,
            'author_id' => 2,
        ]);

        AlatAngkut::create([
            'nama' => 'Kereta Api',
            'slug' => 'kereta-api',
            'author_id' => 1,
        ]);
        AlatAngkut::create([
            'nama' => 'Mobil',
            'slug' => 'mobil',
            'author_id' => 1,
        ]);

        Ketentuan::create([
            'slug' => 'ketentuan-1',
            'kegiatan_id' => 1,
            'kode_rek_dalam_daerah' => 1,
            'kode_rek_luar_daerah' => 1,
            'pptk_id' => 1,
            'bendahara_id' => 1,
            'pelaksana_administrasi_id' => 1,
            'author_id' => 1,
        ]);
        Ketentuan::create([
            'slug' => 'ketentuan-2',
            'kegiatan_id' => 2,
            'kode_rek_dalam_daerah' => 2,
            'kode_rek_luar_daerah' => 2,
            'pptk_id' => 2,
            'bendahara_id' => 2,
            'pelaksana_administrasi_id' => 2,
            'author_id' => 2,
        ]);
    }
}
