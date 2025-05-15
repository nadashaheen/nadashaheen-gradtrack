<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'nour',
            'stdNo' => '11111',
            'email' => 'n@example.com',
            'password' => Hash::make('123'),
            'role' => 'student',
        ]);
        User::create([
            'name' => 'nada',
            'stdNo' => '22222',
            'email' => 'nn@example.com',
            'password' => Hash::make('123'),
            'role' => 'supervisor',
        ]);
        User::factory(5)->create();
    }
}
