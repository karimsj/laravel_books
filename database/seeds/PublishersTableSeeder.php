<?php

use Illuminate\Database\Seeder;


use Faker\Factory as Faker;
class PublishersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('publishers')->delete();
        $faker = Faker::create();
        foreach (range(1, 10) as $index ) {
            DB::table('publishers')->insert([
                'publisher_name' => $faker->name
            ]);
        }
    }
}
