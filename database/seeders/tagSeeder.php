<?php

namespace Database\Seeders;

use App\Models\tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class tagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        tag::factory()->count(10)->create();
    }
}
