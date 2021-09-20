<?php

namespace Database\Seeders;

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
        //DB::table('moves')->delete();
        //DB::table('elements')->delete();
         \App\Models\Move::create(array('name' => '3x3', 'count'=>3));
        \App\Models\Move::create(array('name' => '5x5', 'count'=>5));
        \App\Models\Move::create(array('name' => '7x7', 'count'=>7));
        \App\Models\Element::create(array('name' => 'камень'));
        \App\Models\Element::create(array('name' => 'бумага'));
        \App\Models\Element::create(array('name' => 'ножницы'));
        \App\Models\Element::create(array('name' => 'спок'));
        \App\Models\Element::create(array('name' => 'ящерица'));
        \App\Models\Element::create(array('name' => 'кроко'));
        \App\Models\Element::create(array('name' => 'дино'));
    }
}
