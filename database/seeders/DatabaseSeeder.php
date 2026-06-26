<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run()
{
$this->call(RoleSeeder::class);

$this->call(ServiceSeeder::class);
$this->call(SpecialistSeeder::class);
$this->call(InventorySeeder::class);

User::create([
    'name' => 'Admin',
    'last_name' => 'Principal',
    'phone' => '123456789',
    'email' => 'admin@example.com',
    'password' => Hash::make('password'),
    'role_id' => 1 // admin
]);
}
}
