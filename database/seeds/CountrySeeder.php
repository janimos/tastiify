<?php

use App\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Country::truncate();

      DB::table('countries')->insert([
      'Name' => 'Japan',
      ]);
      DB::table('countries')->insert([
      'Name' => 'Latvia',
      ]);
      DB::table('countries')->insert([
      'Name' => 'Russia',
      ]);
      DB::table('countries')->insert([
      'Name' => 'Spain',
      ]);
    }
}
