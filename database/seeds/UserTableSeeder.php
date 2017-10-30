<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // truncate the user table first
        DB::statement("SET FOREIGN_KEY_CHECKS=0");
        DB::table('users')->truncate();

        // generate 3 users
        DB::table('users')->insert([
        	[
 				'name' => "John Doe",
 				'email' => "johndoe@gmail.com",
 				'password' => bcrypt('secret')
        	],
        	[
 				'name' => "Jane Doe",
 				'email' => "janedoe@gmail.com",
 				'password' => bcrypt('secret')
        	],
        	[
 				'name' => "Edo Marasu",
 				'email' => "edomarasu@gmail.com",
 				'password' => bcrypt('secret')
        	]
        	]);
    }
}
