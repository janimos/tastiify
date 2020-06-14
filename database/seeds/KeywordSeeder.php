<?php

use App\Keyword;
use Illuminate\Database\Seeder;

class KeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Keyword::truncate();
        Keyword::create(['Name' => 'pocky']);
        Keyword::create(['Name' => 'chocolate']);
        Keyword::create(['Name' => 'caramel']);
        Keyword::create(['Name' => 'peanuts']);
        Keyword::create(['Name' => 'cream']);
    }
}
