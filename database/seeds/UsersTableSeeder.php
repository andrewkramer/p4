<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::firstOrCreate(['email' => 'reginald@harvard.edu']);
		$user->email = 'reginald@harvard.edu';
		$user->password = \Hash::make('TestUser');
		$user->save();

		$user = \App\User::firstOrCreate(['email' => 'agnes@harvard.edu']);
		$user->email = 'agnes@harvard.edu';
		$user->password = \Hash::make('TestUser');
		$user->save();
    }
}
