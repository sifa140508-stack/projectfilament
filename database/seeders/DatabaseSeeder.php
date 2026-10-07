<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat Role Admin jika pakai Spatie / Filament Shield
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);

        // 2. Buat Akun Super Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'), // password login: password
            ]
        );

        // 3. Pasangkan Role ke Akun Admin
        $admin->assignRole($adminRole);
    }
}