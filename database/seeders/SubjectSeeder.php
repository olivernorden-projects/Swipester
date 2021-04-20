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
                ['title' => 'Liam', 'description' => 'this Irish name means strong warrior and is a derivative of the name William.'],
                ['title' => 'Noah', 'description' => 'this name comes from Hebrew and refers to a rest or repose.'],
                ['title' => 'William', 'description' => 'originally from France, the name means will or protection.'],
                ['title' => 'James', 'description' => 'this name comes from the Hebrew for the name Jacob and refers to a man who is a follower.'],
                ['title' => 'Logan', 'description' => 'this Scottish name refers to a place but can also mean hollow.'],
                ['title' => 'Ben', 'description' => 'the name Ben comes from Hebrew and simply means son.'],
                ['title' => 'Mason', 'description' => 'meaning a man who is a stone worker, this name comes from old Welsh.'],
                ['title' => 'Elijah', 'description' => 'the name means God is Yahweh and comes from Hebrew.'],
                ['title' => 'Oliver', 'description' => 'an English name which comes from the name of the olive tree.'],
                ['title' => 'Lucas', 'description' => 'this name finds origin in many languages and refers to a place in Italy called Lucania.'],
            ],
        ],
        [
            'title' => 'Movies',
            'items' => [
                ['title' => 'The Shawshank Redemption', 'description' => 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', 'image' => '/images/the-shawshank-redemption.jpg'],
                ['title' => 'The Godfather', 'description' => 'An organized crime dynasty\'s aging patriarch transfers control of his clandestine empire to his reluctant son. ', 'image' => '/images/the-godfather.jpg'],
                ['title' => 'The Dark Knight', 'description' => 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice. ', 'image' => '/images/the-dark-knight.jpg'],
                ['title' => '12 Angry Men', 'description' => 'A jury holdout attempts to prevent a miscarriage of justice by forcing his colleagues to reconsider the evidence. ', 'image' => '/images/12-angry-men.jpg'],
                ['title' => 'Schindler\'s List', 'description' => 'In German-occupied Poland during World War II, industrialist Oskar Schindler gradually becomes concerned for his Jewish workforce after witnessing their persecution by the Nazis.', 'image' => '/images/schindlers-list.jpg'],
                ['title' => 'The Lord of the Rings: The Return of the King', 'description' => 'Gandalf and Aragorn lead the World of Men against Sauron\'s army to draw his gaze from Frodo and Sam as they approach Mount Doom with the One Ring. ', 'image' => '/images/the-lord-of-the-rings-the-return-of-the-king.jpg'],
                ['title' => 'Pulp Fiction', 'description' => 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption. ', 'image' => '/images/pulp-fiction.jpg'],
                ['title' => 'The Good, the Bad and the Ugly', 'description' => 'A bounty hunting scam joins two men in an uneasy alliance against a third in a race to find a fortune in gold buried in a remote cemetery. ', 'image' => '/images/the-good-the-bad-and-the-ugly.jpg'],
                ['title' => 'The Lord of the Rings: The Fellowship of the Ring', 'description' => 'A meek Hobbit from the Shire and eight companions set out on a journey to destroy the powerful One Ring and save Middle-earth from the Dark Lord Sauron. ', 'image' => '/images/the-lord-of-the-rings-the-fellowship-of-the-ring.jpg'],
            ],
        ],
        [
            'title' => 'Food',
            'items' => [
                ['title' => 'Seafood paella', 'description' => 'The sea is lapping just by your feet, a warm breeze whips the tablecloth around your legs and a steamy pan of paella sits in front of you.', 'image' => '/images/seafood-paella.jpg'],
                ['title' => 'Tacos', 'description' => 'A fresh, handmade tortilla stuffed with small chunks of grilled beef rubbed in oil and sea salt then covered with guacamole, salsa, onions, cilantro or anything else you want.', 'image' => '/images/tacos.jpg'],
                ['title' => 'Chicken parm', 'description' => 'Melted Parmesan and mozzarella cheese, and a peppery, garlicky tomato sauce drizzled over the top of a chicken fillet.', 'image' => '/images/chicken-parm.jpg'],
                ['title' => 'Lasagna', 'description' => 'Second only to pizza in the list of famed Italian foods, there\'s a reason this pasta-layered, tomato-sauce-infused, minced-meaty gift to kids and adults alike is so popular.', 'image' => '/images/lasagna.jpg'],
                ['title' => 'Hamburger', 'description' => 'When something tastes so good that people spend $20 billion each year in a single restaurant chain devoted to it, you know it has to fit into this list.', 'image' => '/images/hamburger.jpg'],
                ['title' => 'Sushi', 'description' => 'When Japan wants to build something right, it builds it really right.', 'image' => '/images/sushi.jpg'],
                ['title' => 'Pizza', 'description' => 'Spare us the lumpy chain monstrosities and "everything-on-it" wheels of greed.', 'image' => '/images/pizza.jpg'],
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
