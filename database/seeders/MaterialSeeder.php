<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Material::create([
            'course_id' => 1,
            'title' => "Introduction to Laravel",
            'content' => "this is the first material about Laravel basics",
            'file' => null,
        ]);
    }
}
