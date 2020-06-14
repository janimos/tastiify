<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call(UserSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(KeywordSeeder::class);
        $this->call(ProductSeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}
