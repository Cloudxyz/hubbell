<?php

use Illuminate\Database\Seeder;

class ShopsTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $exists = DB::table('shops_types')->first();

        if(!$exists){

            $json = File::get("database/data/types.json");
            $data = json_decode($json);

            foreach ($data as $obj) {

                // insert category option
                $type_id = DB::table('shops_types')->insertGetId([
                    'id' => $obj->id,
                    'name' => $obj->name
                ]);

            }
        }

    }
}
