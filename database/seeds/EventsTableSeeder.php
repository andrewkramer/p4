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
			'created_by' => 2,
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'last_modified_by' => 2,
			'name' => 'Rule of William the Conqueror',
			'start_date' => '1066-12-25',
			'end_date' => '1087-09-09',
			'description' => 'First period of Norman rule in England.',
			'timeline_id' => 1,
		]);
		
		DB::table('events')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'created_by' => 2,
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'last_modified_by' => 2,
			'name' => 'Rule of William Rufus',
			'start_date' => '1066-12-25',
			'end_date' => '1100-08-02',
			'description' => "Expanded England's control to Wales",
			'timeline_id' => 1,
		]);
		
		DB::table('events')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'created_by' => 1,
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'last_modified_by' => 1,
			'name' => 'Battle of Hastings',
			'start_date' => '1066-10-14',
			'end_date' => '1066-10-14',
			'description' => 'William the Conqueror defeated Harold II.',
			'timeline_id' => 2,
		]);
		
		DB::table('events')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'created_by' => 1,
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'last_modified_by' => 1,
			'name' => 'Battle of Agincourt',
			'start_date' => '1415-10-25',
			'end_date' => '1415-10-25',
			'description' => "Henry V defeated Charles d'Albret",
			'timeline_id' => 2,
		]);
    }
}
