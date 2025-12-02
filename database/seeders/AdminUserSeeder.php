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
        $user = User::query()->updateOrCreate(
            ['email' => env('ADMIN_SEED_EMAIL', 'leonardocbalbi@gmail.com')],
            [
                'name' => env('ADMIN_SEED_NAME', 'Administrador'),
                'password' => Hash::make(env('ADMIN_SEED_PASSWORD', '********')),
                'email_verified_at' => now(),
                'is_admin' => true,
            ]
        );

        // Atribui o papel super-admin se o método assignRole existir
        if (method_exists($user, 'assignRole')) {
            $user->assignRole('super-admin');
        } else {
            \Log::info("Método assignRole não encontrado no modelo User.");
        }
    }
}
