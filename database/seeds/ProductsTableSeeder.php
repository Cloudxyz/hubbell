<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $exists = DB::table('products')->first();

        if(!$exists){

            $json = File::get("database/data/products.json");
            $data = json_decode($json);

            foreach ($data as $obj) {

                // insert product option
                $product_id = DB::table('products')->insertGetId([
                    'id' => $obj->id,
                    'name' => $obj->name,
                    'slug' => $obj->slug,
                    'catalog_id' => $obj->catalog_id,
                    'short_description' => $obj->short_description,
                    'long_description' => $obj->long_description,
                    'is_active' => $obj->is_active
                ]);

            }
        }

    }
}
