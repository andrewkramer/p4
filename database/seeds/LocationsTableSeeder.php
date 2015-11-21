<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'name' => 'Hastings',
			'description' => 'Southeast England',
			'timeline' => 1,
		]);
		
		DB::table('locations')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'name' => 'Agincourt',
			'description' => 'Northwest France',
			'timeline' => 1,
		]);
		
		DB::table('locations')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'name' => 'London, England',
			'description' => 'Capitol of England',
			'timeline' => 0,
		]);
    }
}
