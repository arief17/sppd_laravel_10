<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'nama' => 'Super Admin',
            'slug' => 'super-admin',
        ]);
        LevelAdmin::create([
            'nama' => 'Operator',
            'slug' => 'operator',
        ]);
        LevelAdmin::create([
            'nama' => 'Member',
            'slug' => 'member',
        ]);

        User::create([
            'nama' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'level_admin' => 1,
            'last_login' => '2023-09-27 16:08:16'
        ]);
    }
}
