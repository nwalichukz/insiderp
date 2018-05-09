<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('service_categories')->insert([
        										['name' => 'Entertainment and video Editing',
        										'created_at' => Carbon::now(),
        										'deleted_at' => Carbon::now(),],
        										['name' => 'Business and Consulting',
        										'created_at' => Carbon::now(),
        										'deleted_at' => Carbon::now(),],
        										['name' => 'Education and Training',
        										'created_at' => Carbon::now(),
        										'deleted_at' => Carbon::now(),],
        										['name' => 'Art and Design',
        										'created_at' => Carbon::now(),
        										'deleted_at' => Carbon::now(),],
        										['name' => 'Events and Lifestyle',
        										'created_at' => Carbon::now(),
        										'deleted_at' => Carbon::now(),],
        										['name' => 'Programming and IT',
        										'created_at' => Carbon::now(),
        										'deleted_at' => Carbon::now(),],
        										['name' => 'Sewing and Makeups',
        										'created_at' => Carbon::now(),
        										'deleted_at' => Carbon::now(),],
        										['name' => 'Repairs and Services',
        										'created_at' => Carbon::now(),
        										'deleted_at' => Carbon::now(),],
        										]);
    }
}
