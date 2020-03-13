<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->insert([
			'name' => 'admin',
			'show_name' => 'admin',
			'state' =>1,
			'password' => Hash::make('111111'),
			'created_at' =>\Illuminate\Support\Facades\DB::raw('now()'),
			'updated_at' =>\Illuminate\Support\Facades\DB::raw('now()')
		]);
    }
}
