<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $exists = DB::table('categories')->first();

        if(!$exists){

            $json = File::get("database/data/categories.json");
            $data = json_decode($json);

            foreach ($data as $obj) {

                // insert category option
                $category_id = DB::table('categories')->insertGetId([
                    'id' => $obj->id,
                    'name' => $obj->name,
                    'slug' => $obj->slug,
                    'description' => $obj->description,
                    'has_products' => $obj->has_products,
                    'level_id' => $obj->level_id,
                    'parent_id' => $obj->parent_id
                ]);

            }
        }

    }
}
