<?php

use Illuminate\Database\Seeder;

class CharacterEventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('character_event')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'role' => 'King',
			'event_id' => 1,
			'character_id' => 1,
		]);
		
		DB::table('character_event')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'role' => 'King',
			'event_id' => 2,
			'character_id' => 2,
		]);
		
		DB::table('character_event')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'role' => 'Victor',
			'event_id' => 3,
			'character_id' => 3,
		]);
		
		DB::table('character_event')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'role' => 'Loser',
			'event_id' => 3,
			'character_id' => 4,
		]);
		
		DB::table('character_event')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'role' => 'Victor',
			'event_id' => 4,
			'character_id' => 5,
		]);
		
		DB::table('character_event')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'role' => 'Loser',
			'event_id' => 4,
			'character_id' => 6,
		]);
    }
}
