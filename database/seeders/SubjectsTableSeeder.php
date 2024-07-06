<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Subject;
use App\Models\Classes;
class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $classes = Classes::all();
        foreach ($classes as $class) {
            $subjects = ['Math', 'Science', 'English', 'History', 'Geography', 'Physics', 'Chemistry', 'Biology', 'Computer', 'Physical Education'];
            foreach ($subjects as $subject) {
                Subject::factory()->create([
                    'name' => $subject,
                    'class_id' => $class->id,
                    'status' => true
                ]);
            }
        }
    }
}
