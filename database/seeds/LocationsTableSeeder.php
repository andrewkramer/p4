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
			'created_by' => 1,
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'last_modified_by' => 1,
			'name' => 'Hastings',
			'description' => 'Southeast England',
			'timeline_id' => 2,
		]);
		
		DB::table('locations')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'created_by' => 1,
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'last_modified_by' => 1,
			'name' => 'Agincourt',
			'description' => 'Northwest France',
			'timeline_id' => 2,
		]);
		
		DB::table('locations')->insert([
			'created_at' => Carbon\Carbon::now()->toDateTimeString(),
			'created_by' => 1,
			'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
			'last_modified_by' => 1,
			'name' => 'London, England',
			'description' => 'Capitol of England',
			'timeline_id' => 1,
		]);
    }
}
