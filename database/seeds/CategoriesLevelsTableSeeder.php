<?php

use Illuminate\Database\Seeder;

class CategoriesLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $exists = DB::table('categories_levels')->first();

        if(!$exists){

            $json = File::get("database/data/levels.json");
            $data = json_decode($json);

            foreach ($data as $obj) {

                // insert category level option
                $level_id = DB::table('categories_levels')->insertGetId([
                    'id' => $obj->id,
                    'name' => $obj->name
                ]);

            }
        }

    }
}
