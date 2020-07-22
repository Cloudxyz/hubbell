<?php

use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $exists = DB::table('shops')->first();

        if(!$exists){

            $json = File::get("database/data/shops.json");
            $data = json_decode($json);

            foreach ($data as $obj) {

                // insert category option
                $shop_id = DB::table('shops')->insertGetId([
                    'id' => $obj->id,
                    'name' => $obj->name,
                    'phone' => $obj->phone,
                    'email' => $obj->email,
                    'web' => $obj->web,
                    'address' => $obj->address,
                    'latitude' => $obj->latitude,
                    'longitude' => $obj->longitude
                ]);

            }
        }

    }
}
