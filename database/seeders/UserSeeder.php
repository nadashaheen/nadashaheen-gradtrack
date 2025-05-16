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
            'name' => 'Nour Shaheen',
            'stdNo' => '2301216070',
            'email' => 'nour@example.com',
            'password' => Hash::make('123'),
            'role' => 'student',
        ]);
        User::create([
            'name' => 'Nada Shaheen',
            'stdNo' => '2301216080',
            'email' => 'nada@example.com',
            'password' => Hash::make('123'),
            'role' => 'student',
        ]);

        User::create([
            'name' => 'Saja Abu-Shoaib',
            'stdNo' => '2301216090',
            'email' => 'saja@example.com',
            'password' => Hash::make('123'),
            'role' => 'student',
        ]);
        User::create([
            'name' => 'Mohammed abu-Hayya',
            'stdNo' => '1216080',
            'email' => 'mohammed@example.com',
            'password' => Hash::make('123'),
            'role' => 'supervisor',
        ]);
//        User::factory(5)->create();
    }
}
