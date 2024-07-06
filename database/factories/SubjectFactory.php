<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{    
    protected $model = Subject::class;
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Math', 'Science', 'English', 'History', 'Geography', 'Physics', 'Chemistry', 'Biology', 'Computer', 'Physical Education']),
            'class_id' => \App\Models\Classes::factory(),
        ];
    }
}
