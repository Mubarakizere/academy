<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@divahouse.com'],
            [
                'name' => 'Admissions Administrator',
                'password' => bcrypt('password'),
                'phone' => '+250780159059',
                'is_active' => true,
            ]
        );

        $admin->assignRole('admin');
    }
}
