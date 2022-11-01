<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hrd = User::create([
            'email' => 'hrd@gmail.com',
            'name' => 'hrd',
            'email_verified_at' => now(),
            'password' => bcrypt(12345678),
            'remember_token' => Str::random(10),
        ]);

        $karyawan = User::create([
            'email' => 'karyawan@gmail.com',
            'name' => 'karyawan',
            'email_verified_at' => now(),
            'password' => bcrypt(12345678),
            'remember_token' => Str::random(10),
        ]);

        Role::create([
            'name' => 'hrd',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'karyawan',
            'guard_name' => 'web'
        ]);

        $hrd->assignRole('hrd');
        $karyawan->assignRole('karyawan');
    }
}
