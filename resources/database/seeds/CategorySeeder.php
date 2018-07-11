<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
          DB::table('categories')->insert([
            ['name' => 'Politics',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
            ['name' => 'Education',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
            ['name' => 'Sports',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
            ['name' => 'Religion',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
            ['name' => 'Romance',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
            ['name' => 'Technology',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
            ['name' => 'Entertainment',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
            ['name' => 'Culture',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
             ['name' => 'Travel',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
             ['name' => 'Betting',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
              ['name' => 'Tourism',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
              ['name' => 'Jokes',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
              ['name' => 'Celebrity',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
               ['name' => 'World',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
                ['name' => 'Events',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
                ['name' => 'Gossip',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
                ['name' => 'Movies',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
                ['name' => 'Fashion',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
                ['name' => 'President Buhari',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
                ['name' => 'Programming',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
                 ['name' => 'Birthdays',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
                ['name' => 'CarTalk',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
                ['name' => 'Entrepreneurship',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),],
        ]);
  
    }
}
