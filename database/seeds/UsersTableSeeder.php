<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $exists = DB::table('users')->first();

        if(!$exists){

            $json = File::get("database/data/users.json");
            $data = json_decode($json);

            foreach ($data as $obj) {

                // insert user
                $user_id = DB::table('users')->insertGetId([
                    'id' => $obj->id,
                    'name' => $obj->name,
                    'email' => $obj->email,
                    'email_verified_at' => $obj->email_verified_at,
                    'password' => Hash::make($obj->password),
                    'is_enabled' => $obj->is_enabled,
                    'created_at' => '2020-01-01 00:00:00',
                    'updated_at' => '2020-01-01 00:00:00'
                ]);

                // attach roles
                $role_relation_id = DB::table('user_has_roles')->insertGetId([
                    'user_id' => $user_id,
                    'role_id' => $obj->user_role_id
                ]);

            }
        }

    }
}
