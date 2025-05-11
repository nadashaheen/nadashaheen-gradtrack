<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = Role::firstOrCreate(['name' => 'student', 'guard_name' => 'web']);
        $supervisor = Role::firstOrCreate(['name' => 'supervisor', 'guard_name' => 'web']);

        // Create permissions only if they don't already exist
        $submitProject = Permission::firstOrCreate(['name' => 'submit project', 'guard_name' => 'web']);
        $reviewProject = Permission::firstOrCreate(['name' => 'review project', 'guard_name' => 'web']);

        // Give permissions to roles
        $student->givePermissionTo($submitProject);
        $supervisor->givePermissionTo($reviewProject);
    }
}
