<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\ProjectStageFactory;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ProjectSeeder::class,
            ProjectStageSeeder::class,
            SubmissionSeeder::class,
            CommentSeeder::class,
            MeetingSeeder::class,
            StageEvaluationSeeder::class,
            RolePermissionSeeder::class,
        ]);
    }
}

