<?php

use Illuminate\Database\Seeder;

class EventsCharactersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events_characters')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'role' => 'King',
			'event' => 0,
			'character' => 0,
		]);
		
		DB::table('events_characters')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'role' => 'King',
			'event' => 1,
			'character' => 1,
		]);
		
		DB::table('events_characters')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'role' => 'Victor',
			'event' => 2,
			'character' => 2,
		]);
		
		DB::table('events_characters')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'role' => 'Loser',
			'event' => 2,
			'character' => 3,
		]);
		
		DB::table('events_characters')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'role' => 'Victor',
			'event' => 3,
			'character' => 4,
		]);
		
		DB::table('events_characters')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'role' => 'Loser',
			'event' => 3,
			'character' => 5,
		]);
    }
}
