<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['media', 'business', 'music', 'art', 'economics', 'education', 'politics'];

        foreach ($data as $item) {
            DB::table('categories')->insert([
                'name' => $item
            ]);
        }
    }
}
