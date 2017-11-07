<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 15;
        while ($i) {
            \App\Models\User::create([
                'name' => "Category {$i}"]);
            $i--;
        }
    }


{
$i = 15;
while ($i) {
\App\Models\Category::create([
'name' => "Category {$i}"]);
            $i--;
        }
    }


$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
}
