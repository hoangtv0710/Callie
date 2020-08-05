<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('categories')->count() == 0) {
    		DB::table('categories')->insert([
    			[
    				'name' => $name = 'Sao',
    				'slug' =>  str_slug($name),
    				'status' => 1,
    			],
    			[
    				'name' => $name = 'Giới trẻ',
    				'slug' =>  str_slug($name),
    				'status' => 1,
    			],
    		]);
        }
    }
}
