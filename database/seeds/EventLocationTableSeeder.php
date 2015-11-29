<?php

use Illuminate\Database\Seeder;

class EventLocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_location')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'event_id' => 1,
			'location_id' => 3,
		]);
		
		DB::table('event_location')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'event_id' => 2,
			'location_id' => 3,
		]);
		
		DB::table('event_location')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'event_id' => 3,
			'location_id' => 1,
		]);
		
		DB::table('event_location')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'event_id' => 4,
			'location_id' => 2,
		]);
    }
}
