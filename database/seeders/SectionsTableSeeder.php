<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Section;
use App\Models\Classes;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = Classes::all();
        foreach ($classes as $class) {
            foreach (range('A', 'K') as $section) {
                Section::create([
                    'name' => $section,
                    'class_id' => $class->id,
                ]);
            }
        }
    }
}
