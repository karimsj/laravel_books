<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        foreach(range(1,25) as $index) {
            DB::table('books')->insert([
                'name' => str_random(15),
                'publish_date' => $faker->unique()->dateTimeBetween($startDate = "now", $endDate = "30 days"),
                'edition' => rand(1,3),
                'isbn_10' => $faker->isbn10,
                'isbn_13' => $faker->isbn13,
                'publisher_id' => rand(1,10)
            ]);
        }
    }
}
