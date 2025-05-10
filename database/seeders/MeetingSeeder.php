<?php

namespace Database\Seeders;

use App\Models\Meeting;
use App\Models\ProjectStage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Meeting::factory(5)->create();

    }
}
