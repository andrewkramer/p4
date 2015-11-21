<?php

use Illuminate\Database\Seeder;

class TimelinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('timelines')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'name' => 'British Monarchs',
			'description' => 'Displays all British monarchs from 1066A.D. to present day.',
		]);
		
		DB::table('timelines')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'name' => 'Medieval Battles',
			'description' => 'Displays significant battles in Medieval history.',
		]);
    }
}
