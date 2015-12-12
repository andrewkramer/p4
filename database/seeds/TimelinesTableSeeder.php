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
			'created_by' => 2,
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'last_modified_by' => 2,
			'name' => 'British Monarchs',
			'description' => 'Displays all British monarchs from 1066A.D. to present day.',
			'user_id' => 2,
		]);
		
		DB::table('timelines')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'created_by' => 1,
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'last_modified_by' => 1,
			'name' => 'Medieval Battles',
			'description' => 'Displays significant battles in Medieval history.',
			'user_id' => 1,
		]);
    }
}
