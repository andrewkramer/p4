<?php

use Illuminate\Database\Seeder;

class EventsLocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events_locations')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'event' => 0,
			'location' => 2,
		]);
		
		DB::table('events_locations')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'event' => 1,
			'location' => 2,
		]);
		
		DB::table('events_locations')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'event' => 2,
			'location' => 0,
		]);
		
		DB::table('events_locations')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'event' => 3,
			'location' => 1,
		]);
    }
}
