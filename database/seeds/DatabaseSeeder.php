<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\User::class, 50)->create();
//        factory(App\Models\Category::class, 6)->create();
        $this->call(CategoriesTableSeeder::class);
        factory(App\Models\Post::class, 400)->create();
        factory(App\Models\Comment::class, 700)->create();
        factory(App\Models\Tag::class, 20)->create();
        $this->call(PostTagTableSeeder::class);
        $this->call(LikesTableSeeder::class);
    }
}
