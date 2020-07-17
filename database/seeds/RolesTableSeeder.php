<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $exists = DB::table('roles')->first();

        if(!$exists){

            $json = File::get("database/data/roles.json");
            $data = json_decode($json);

            foreach ($data as $obj) {

                // insert role option
                $role_id = DB::table('roles')->insertGetId([
                    'id' => $obj->id,
                    'name' => $obj->name
                ]);

            }
        }

    }
}
