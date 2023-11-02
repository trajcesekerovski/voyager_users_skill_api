<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $array_skills = [
            ['skill' => 'js'],
            ['skill' => 'php'],
            ['skill' => 'html'],
            ['skill' => 'css']
        ];

        \DB::table('skills')->insert($array_skills);
    }
}
