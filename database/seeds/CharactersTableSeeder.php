<?php

use Illuminate\Database\Seeder;

class CharactersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('characters')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'created_by' => 2,
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'last_modified_by' => 2,
			'name' => 'William I',
			'race' => 'Norman',
			'biography' => 'Conquered England from the Saxons in 1066A.D. ushering in the Medieval period.',
			'timeline_id' => 1,
		]);
		
		DB::table('characters')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'created_by' => 2,
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'last_modified_by' => 2,
			'name' => 'William II',
			'race' => 'Norman',
			'biography' => 'Brought Wales under the rule of England.',
			'timeline_id' => 1,
		]);
		
		DB::table('characters')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'created_by' => 1,
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'last_modified_by' => 1,
			'name' => 'William I',
			'race' => 'Norman',
			'biography' => 'Conquered England from the Saxons in 1066A.D. ushering in the Medieval period. Ruled England from 1066-1087.',
			'timeline_id' => 2,
		]);
		
		DB::table('characters')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'created_by' => 1,
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'last_modified_by' => 1,
			'name' => 'Harold II',
			'race' => 'Saxon',
			'biography' => 'The last king of England during the Dark Ages. Ruled for nine months in 1066A.D.',
			'timeline_id' => 2,
		]);
		
		DB::table('characters')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'created_by' => 1,
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'last_modified_by' => 1,
			'name' => 'Henry V',
			'race' => 'Welsh',
			'biography' => 'Ruled England from 1413 to 1422. Brought an end to the Hundred Years War.',
			'timeline_id' => 2,
		]);
		
		DB::table('characters')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'created_by' => 1,
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'last_modified_by' => 1,
			'name' => "Charles d'Albret",
			'race' => 'French',
			'biography' => 'Led the armies of France for a time during the reign of Charles VI.',
			'timeline_id' => 2,
		]);
		
		
		
    }
}
