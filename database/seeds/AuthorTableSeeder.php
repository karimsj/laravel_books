<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class AuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('authors')->delete();
        $faker = Faker::create();
        foreach (range(1, 10) as $index ) {
            DB::table('authors')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName
            ]);
        }
    }
}
