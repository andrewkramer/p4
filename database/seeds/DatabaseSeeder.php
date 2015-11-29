<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
		
		$this->call(UsersTableSeeder::class);
        $this->call(TimelinesTableSeeder::class);
		$this->call(CharactersTableSeeder::class);
		$this->call(LocationsTableSeeder::class);
		$this->call(EventsTableSeeder::class);
		$this->call(CharacterEventTableSeeder::class);
		$this->call(EventLocationTableSeeder::class);

        Model::reguard();
    }
}
