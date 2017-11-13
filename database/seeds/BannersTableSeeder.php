<?php

use Illuminate\Database\Seeder;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        $limit = 10;
        while ($limit) {
            $productName = Faker\Factory::create()->word;
            $price = Faker\Factory::create()->randomNumber($nbDigits = 3, $strict = false);
            $sellerSite = Faker\Factory::create()->domainName;

            $imageId = Faker\Factory::create()->numberBetween($min = 1, $max = 9);
            $imageNameFull = $imageId . '.jpg';

            $data[$productName . $price . $sellerSite . $imageNameFull] = [
                'product_name' => $productName,
                'price' => $price,
                'seller_site' => $sellerSite,
                'image_name' => $imageNameFull
            ];
            $limit--;
        }

        foreach ($data as $item) {
            DB::table('banners')->insert($item);
        }
    }
}
