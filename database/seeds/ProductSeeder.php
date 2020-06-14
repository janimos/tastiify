<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();
        Product::create(array(
          'Name' => 'Pocky',
          'price' => 4.99,
          'country_id' => 1,
          'cart_products_id' => 1
        ));
        Product::create(array(
          'Name' => 'Alyonka',
          'price' => 2,
          'country_id' => 3,
          'cart_products_id' => 2
        ));
        Product::create(array(
          'Name' => 'Gailitis',
          'price' => 1.49,
          'country_id' => 2,
          'cart_products_id' => 3
        ));
        Product::create(array(
          'Name' => 'Turron',
          'price' => 7.89,
          'country_id' => 4,
          'cart_products_id' => 4
        ));
    }
}
