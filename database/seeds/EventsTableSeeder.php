<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'name' => 'Rule of William the Conqueror',
			'start_date' => '1066-12-25',
			'end_date' => '1087-09-09',
			'description' => 'First period of Norman rule in England.',
			'timeline' => 0,
		]);
		
		DB::table('events')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'name' => 'Rule of William Rufus',
			'start_date' => '1066-12-25',
			'end_date' => '1100-08-02',
			'description' => "Expanded England's control to Wales",
			'timeline' => 0,
		]);
		
		DB::table('events')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'name' => 'Battle of Hastings',
			'start_date' => '1066-10-14',
			'end_date' => '1066-10-14',
			'description' => 'William the Conqueror defeated Harold II.',
			'timeline' => 1,
		]);
		
		DB::table('events')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'name' => 'Battle of Agincourt',
			'start_date' => '1415-10-25',
			'end_date' => '1415-10-25',
			'description' => "Henry V defeated Charles d'Albret",
			'timeline' => 1,
		]);
    }
}
