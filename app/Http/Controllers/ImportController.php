<?php

namespace App\Http\Controllers;

use App\Models\{
    User,
    Category,
    Product
};
use App\Imports\{
    UsersImport,
    CategoriesImport,
    ProductsImport
};
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{

    public function categories()
    {
        return view('categories.import');
    }

    public function products()
    {
        return view('products.import');
    }

    public function users()
    {
        return view('users.import');
    }

    public function import(Request $request, $type)
    {
        $this->importCsv($request->csv, $type);
        return redirect(route($type));
    }

    private function importCsv($file, $type)
    {
        switch ($type) {
            case 'users':
                $typeImport = new UsersImport;
                break;
            case 'categories':
                $typeImport = new CategoriesImport;
                break;
            case 'products':
                $typeImport = new ProductsImport;
                break;
        }

        Excel::import($typeImport, $file);
    }
}
