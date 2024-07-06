<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slot;

class SlotsTableSeeder extends Seeder
{
    public function run()
    {
        $slots = [
            ['start_time' => '09:00:00', 'end_time' => '09:30:00', 'is_break' => false, 'status'=>true],
            ['start_time' => '09:30:00', 'end_time' => '10:00:00', 'is_break' => false, 'status'=>true],
            ['start_time' => '10:00:00', 'end_time' => '10:30:00', 'is_break' => false, 'status'=>true],
            ['start_time' => '10:30:00', 'end_time' => '11:00:00', 'is_break' => false, 'status'=>true],
            ['start_time' => '11:00:00', 'end_time' => '11:15:00', 'is_break' => true, 'status'=>true],  // Break
            ['start_time' => '11:15:00', 'end_time' => '11:45:00', 'is_break' => false, 'status'=>true],
            ['start_time' => '11:45:00', 'end_time' => '12:15:00', 'is_break' => false, 'status'=>true],
            ['start_time' => '12:15:00', 'end_time' => '12:45:00', 'is_break' => false, 'status'=>true],
            ['start_time' => '12:45:00', 'end_time' => '13:15:00', 'is_break' => false, 'status'=>true],
        ];

        foreach ($slots as $slot) {
            Slot::create($slot);
        }
    }

}
