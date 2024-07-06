<?php

namespace Database\Factories;

use App\Models\Slot;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Slot>
 */
class SlotFactory extends Factory
{
    protected $model = Slot::class;

    public function definition()
    {
        return [
            'start_time' => $this->faker->time('H:i:s', '13:00:00'),
            'end_time' => $this->faker->time('H:i:s', '13:30:00'),
            'is_break' => $this->faker->boolean(10),  // 10% chance of being a break
        ];
    }
}
