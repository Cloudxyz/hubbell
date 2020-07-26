<?php

namespace App\Imports;

use App\Models\{
    Product,
    Category,
    ProductDetail,
    Shop
};
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $product = new Product;
        $productName = addslashes($row['nombre']);
        $productShops = $row['tiendas'];
        $productCategories = $row['categorias'];
        $productDetails = $row['detalles'];
        $product->name = $productName;
        if (!empty($row['slug'])) {
            $slug = $row['slug'];
        } else {
            $slug = deleteAccents($productName);
        }
        $product->slug = $slug;
        $product->catalog_id = $row['id_catalogo'];
        $product->short_description = addslashes($row['descripcion_corta']);
        $product->long_description = addslashes($row['descripcion_larga']);
        $product->is_active = $row['activo'];

        if ($product->save()) {
            if ($productDetails != null) {
                $detailsArr = array_map('trim', preg_split('/\R/', $productDetails));
                $details = [];
                foreach ($detailsArr as $key => $detail) {
                    $detailsSingleArr = explode(';', $detail);
                    foreach ($detailsSingleArr as $single) {
                        $details[$key][] = $single;
                    }
                }
                foreach ($details as $detail) {
                    $detailNew = new ProductDetail;
                    $detailNew->title_section = $detail[0];
                    $detailNew->title = $detail[1];
                    $detailNew->description = $detail[2];
                    $detailNew->product_id = $product->id;
                    $detailNew->save();
                }
            }

            if ($productCategories != null) {
                if (strpos($productCategories, ";") !== false) {
                    $categoriesArr = explode(';', $productCategories);
                    $categoriesData = [];
                    foreach ($categoriesArr as $category) {
                        $getCategory = Category::where('name', $category)->first()->id;
                        $categoriesData[] = $getCategory;
                    }
                    $product->categories()->sync($categoriesData);
                } else {
                    $category = Category::where('name', $productCategories)->first()->id;
                    $product->categories()->sync([$category]);
                }
            }

            if ($productShops != null) {
                if (strpos($productShops, ";") !== false) {
                    $shopsArr = explode(';', $productShops);
                    $shopsData = [];
                    foreach ($shopsArr as $shop) {
                        $getShop = Shop::where('name', $shop)->first()->id;
                        $shopsData[] = $getShop;
                    }
                    $product->shops()->sync($shopsData);
                } else {
                    $shop = Shop::where('name', $productShops)->first()->id;
                    $product->shops()->sync([$shop]);
                }
            }
        }
    }
}
