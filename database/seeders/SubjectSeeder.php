<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{

    private static $subjects = [
        ['title' => 'Boy names'],
        ['title' => 'Movies'],
        ['title' => 'Food'],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (static::$subjects as $subject) {
            Subject::create($subject);
        }
    }
}
