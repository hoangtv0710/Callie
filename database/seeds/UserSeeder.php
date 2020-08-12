<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('users')->count() == 0) {
    		DB::table('users')->insert([
    			[
    				'name' => 'Admin',
                    'email' => 'admin@gmail.com',
                    'password' => Hash::make('Admin@1234'),
                    'role' => 3,
                    'status' => 1
    			],
    			[
    				'name' => 'Moderator',
                    'email' => 'moderator@gmail.com',
                    'password' => Hash::make('Moderator@1234'),
                    'role' => 2,
                    'status' => 1
                ],
                [
    				'name' => 'Member',
                    'email' => 'member@gmail.com',
                    'password' => Hash::make('Member@1234'),
                    'role' => 1,
                    'status' => 1
    			],
    		]);
        }
    }
}
