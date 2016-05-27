<?php

use Illuminate\Database\Seeder;

class BookAuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        foreach(range(1,25) as $index) {
            DB::table('book_author')->insert([
                'book_id' => $index,
                'author_id' => rand(1,10)
            ]);
        }
    }
}
