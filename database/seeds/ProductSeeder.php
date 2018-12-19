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
                'category_id' => 0,
                'subcategory_id' => $faker->name,
                'color_id' => $faker->email,
                'image_id' => $faker->email,
                'brand' => $faker->realText(100),
                'name' =>$faker->realText(500),
                'cover' =>$faker->realText(500),
                'quantity' =>$faker->realText(500),
                'price' =>$faker->realText(500),
                'details' =>$faker->realText(500),
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>date('Y-m-d H:i:s'),
            ]);
        }
    }
}
