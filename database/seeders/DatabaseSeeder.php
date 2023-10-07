<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bidang;
use App\Models\Golongan;
use App\Models\LevelAdmin;
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
        
        Bidang::create([
            'nama' => 'BIDANG BINA MARGA',
            'slug' => 'bidang-bina-marga',
            'jenis' => 'BIDANG',
            'author_id' => 1,
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
    }
}
