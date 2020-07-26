<?php

namespace App\Imports;

use App\Models\Category;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoriesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $category = new Category;
        $category->name = $row['nombre'];
        if (!empty($row['slug'])) {
            $slug = $row['slug'];
        } else {
            $slug = deleteAccents($row['nombre']);
        }
        $category->slug = $slug;
        $category->description = $row['descripcion'];
        $category->has_products = $row['tiene_productos'];
        $category->level_id = $row['nivel'];
        if ($row['categoria_padre'] != null) {
            $parend_category = Category::where('name', $row['categoria_padre'])->first()->id;
            $category->parent_id = $parend_category;
        }
        $category->save();
    }
}
