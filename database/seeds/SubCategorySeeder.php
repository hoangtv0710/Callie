<?php

use Illuminate\Database\Seeder;
use App\Category; 

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('sub_categories')->count() == 0) {
    		DB::table('sub_categories')->insert([
    			[
    				'name' => $name = 'Sao việt',
                    'slug' =>  str_slug($name),
                    'cate_id' => 1,
    				'status' => 1,
    			],
    			[
    				'name' => $name = 'Yêu',
                    'slug' =>  str_slug($name),
                    'cate_id' => 2,
    				'status' => 1,
    			],
    		]);
        }
    }
}
