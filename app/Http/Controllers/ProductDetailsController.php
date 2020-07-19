<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    ProductDetail
};
use App\Repositories\{
    ProductDetailsRepositoryInterface
};

class ProductDetailsController extends Controller
{
    private $repository;
    private $usersRepository;

    public function __construct(
        ProductDetailsRepositoryInterface $repository
    ){
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $search = trim($request->s);
        $productDetails = $this->repository->all($search);

        return view('product_details.index')
            ->with('productDetails', $productDetails)
            ->with('search', $search);
    }

    public function create()
    {
        $productDetail = $this->repository->blueprint();
        return view('product_details.create')
            ->with('productDetail', $productDetail);
    }

    public function store(Request $request)
    {
        $productDetail = $this->repository->create($request);
        $request->session()->flash('success', __('Record created successfully'));
        return redirect(route('product_details.edit', [$productDetail->id]));
    }

    public function show(ProductDetail $productDetail)
    {
        $productDetail = $this->repository->find($productDetail);
        return view('product_details.show')
            ->with('productDetail', $productDetail);
    }

    public function edit(MyList $productDetail)
    {
        $productDetail = $this->repository->find($productDetail);
        $configUsers = ['paginate' => false];
        $users = $this->usersRepository->all('', $configUsers);
        return view('product_details.edit')
            ->with('productDetail', $productDetail)
            ->with('users', $users);
    }

    public function update(Request $request, $id)
    {
        $this->repository->update($request, $id);
        $request->session()->flash('success', __('Record updated successfully'));
        return redirect(route('product_details.edit', [$id]));
    }

    public function destroy(Request $request, $id)
    {
        if ( $this->repository->canDelete($id) ) {
            $this->repository->delete($id);
            $request->session()->flash('success', __('Record deleted successfully'));
            return redirect(route('product_details'));
        }

        $request->session()->flash('error', __("This record can't be deleted"));
        return redirect()->back();
    }
}
