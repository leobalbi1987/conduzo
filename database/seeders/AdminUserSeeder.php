<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => env('ADMIN_SEED_EMAIL', 'admin@example.com')],
            [
                'name' => env('ADMIN_SEED_NAME', 'Administrador'),
                'password' => Hash::make(env('ADMIN_SEED_PASSWORD', 'password')),
                'email_verified_at' => now(),
                'is_admin' => true,
            ]
        );
    }
}
