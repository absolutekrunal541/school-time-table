<?php

namespace Database\Factories;

use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    protected $model = Teacher::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'designation' => 'teacher',
            'email' => $this->faker->unique()->safeEmail,
            'mobile_number' => $this->faker->unique()->numerify('##########'),
            'address' => 'India, Surat',
            'pincode' => $this->faker->numberBetween(300000, 500000),
            'status' => 1 // active
        ];
    }
}
