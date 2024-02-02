<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "id" => 1,
            "name" => "Administrador",
            "email" => "admin@admin.com",
            "password" => Hash::make('admin1234'),
            "role_id" => 1,
            "company_id" => 1
        ]);

        User::factory()->companyOwner()->count(2)->create();
        User::factory()->guide()->count(10)->create();
    }
}
