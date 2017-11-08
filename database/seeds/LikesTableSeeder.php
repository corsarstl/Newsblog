<?php

use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $limit = 400;
        while ($limit) {
            $user = User::all()->random(1)->first();
            $comment = Comment::all()->random(1)->first();
            $like = Faker\Factory::create()->boolean($chanceOfGettingTrue = 50);
            $data[$user->id . $comment->id . $like] = [
                'user_id' => $user->id,
                'comment_id' => $comment->id,
                'like' => $like
            ];
            $limit--;
        }

        foreach ($data as $item) {
            DB::table('likes')->insert($item);
        }
    }
}
