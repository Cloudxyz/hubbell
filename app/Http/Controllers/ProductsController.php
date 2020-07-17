<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\{ ProductsRepositoryInterface, CategoriesRepositoryInterface };
use App\Models\{
    Product,
    Category
};

class ProductsController extends Controller
{
    private $repository;
    private $categoriesRepository;

    public function __construct(ProductsRepositoryInterface $repository, CategoriesRepositoryInterface $categoriesRepository)
    {
        $this->repository = $repository;
        $this->categoriesRepository = $categoriesRepository;
    }

    public function index(Request $request)
    {
        $search = trim($request->s);
        $products = $this->repository->all($search);

        return view('products.index')
            ->with('products', $products)
            ->with('search', $search);
    }

    public function create()
    {
        $product = $this->repository->blueprint();
        $categories = Category::where('has_products', 1)->get();
        return view('products.create')
            ->with('product', $product)
            ->with('categories', $categories);
    }

    public function store(Request $request)
    {
        $product = $this->repository->create($request);
        $request->session()->flash('success', __('Record created successfully'));
        return redirect(route('products.edit', [$product->id]));
    }

    public function show(Product $product)
    {
        $product = $this->repository->find($product);
        $categories = $this->categoriesRepository->all('');
        return view('products.show')
            ->with('product', $product)
            ->with('categories', $categories);
    }

    public function edit(Product $product)
    {
        $product = $this->repository->find($product);
        $categories = Category::where('has_products', 1)->get();
        return view('products.edit')
            ->with('product', $product)
            ->with('categories', $categories);
    }

    public function update(Request $request, $id)
    {
        $this->repository->update($request, $id);
        $request->session()->flash('success', __('Record updated successfully'));
        return redirect(route('products.edit', [$id]));
    }

    public function destroy(Request $request, $id)
    {
        if ( $this->repository->canDelete($id) ) {
            $this->repository->delete($id);
            $request->session()->flash('success', __('Record deleted successfully'));
            return redirect(route('products'));
        }

        $request->session()->flash('error', __("This record can't be deleted"));
        return redirect()->back();
    }
}
