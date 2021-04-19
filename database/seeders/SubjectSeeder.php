<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{

    private static $seedSubjects = [
        [
            'title' => 'Boy names', 
            'items' => [
                ['title' => 'Oliver'],
                ['title' => 'Oskar'],
                ['title' => 'Erik'],
            ],
        ],
        [
            'title' => 'Movies',
            'items' => [
                ['title' => 'Field of Dreams'],
                ['title' => 'Interstellar'],
                ['title' => 'The Imitation Game'],
            ],
        ],
        [
            'title' => 'Food',
            'items' => [
                ['title' => 'Hamburger'],
                ['title' => 'Pasta'],
                ['title' => 'Sushi'],
            ],
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (static::$seedSubjects as $seedSubject) {
            // Save subject items and remove from subject array
            // Items cannot be added with Subject::create()
            $items = $seedSubject['items'];
            unset($seedSubject['items']);

            $subject = Subject::create($seedSubject);

            // Add items to subject
            foreach ($items as $item) {
                $subject->items()->create($item);
            }
        }
    }
}
