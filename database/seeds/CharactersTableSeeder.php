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
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'name' => 'William I',
			'race' => 'Norman',
			'biography' => 'Conquered England from the Saxons in 1066A.D. ushering in the Medieval period.',
			'timeline' => 1,
		]);
		
		DB::table('characters')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'name' => 'William II',
			'race' => 'Norman',
			'biography' => 'Brought Wales under the rule of England.',
			'timeline' => 1,
		]);
		
		DB::table('characters')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'name' => 'William I',
			'race' => 'Norman',
			'biography' => 'Conquered England from the Saxons in 1066A.D. ushering in the Medieval period. Ruled England from 1066-1087.',
			'timeline' => 2,
		]);
		
		DB::table('characters')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'name' => 'Harold II',
			'race' => 'Saxon',
			'biography' => 'The last king of England during the Dark Ages. Ruled for nine months in 1066A.D.',
			'timeline' => 2,
		]);
		
		DB::table('characters')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'name' => 'Henry V',
			'race' => 'Welsh',
			'biography' => 'Ruled England from 1413 to 1422. Brought an end to the Hundred Years War.',
			'timeline' => 2,
		]);
		
		DB::table('characters')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'name' => "Charles d'Albret",
			'race' => 'French',
			'biography' => 'Led the armies of France for a time during the reign of Charles VI.',
			'timeline' => 2,
		]);
		
		
		
    }
}
