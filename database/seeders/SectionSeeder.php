<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::create([
            'name' => 'Front End Developer'
        ]);
        Section::create([
            'name' => 'Back End Developer'
        ]);
        Section::create([
            'name' => 'Level Designer'
        ]);
        Section::create([
            'name' => 'Unity'
        ]);
        Section::create([
            'name' => 'Quality Ansurance'
        ]);
    }
}
