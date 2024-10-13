<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'name' => 'Basic Laravel',
            'detail' => 'Learn the Basics of Laravel Framework',
            'image' => '20240   921095832.png',
            'category' => 'Programming',
            'mentor_id' => 1,
            'price' => 'Rp. 100.000',
            'isPaid' => true,
        ]);
    }
}
