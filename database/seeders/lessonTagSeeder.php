<?php

namespace Database\Seeders;

use App\Models\lessonTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class lessonTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        lessonTag::factory()->count(500)->create();
    }
}
