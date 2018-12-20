<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_US');
        foreach (range(1,50) as $index) {
            DB::table('products')->insert([
                'category_id' => $faker->shuffle(array(1, 2, 3)),
                'subcategory_id' => $faker->shuffle(array(1, 2, 3)),
                'color_id' => $faker->shuffle(array(1, 2)),
                'image_id' => $faker->shuffle(array(1, 2, 3)),
                'brand' => $faker->randomElement($array = array ('Nokia','Samsung','HP','Asus')),
                'model' =>$faker->word,
                'cover' =>$faker->$faker->imageUrl($width = 640, $height = 480, 'technics'),
                'quantity' =>$faker->randomDigit,
                'price' =>$faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),
                'details' =>$faker->realText(500),
                'release' =>$faker->date($format = 'Y-m-d', $max = 'now'),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
        }

    }
}
