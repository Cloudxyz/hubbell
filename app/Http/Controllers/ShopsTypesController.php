<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    ShopType
};
use App\Repositories\{
    ShopsTypesRepositoryInterface
};

class ShopsTypesController extends Controller
{
    private $repository;
    public function __construct(
        ShopsTypesRepositoryInterface $repository
    ){
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $search = trim($request->s);
        $types = $this->repository->all($search);

        return view('shops-types.index')
            ->with('types', $types)
            ->with('search', $search);
    }

    public function create()
    {
        $type = $this->repository->blueprint();
        return view('shops-types.create')
            ->with('type', $type);
    }

    public function store(Request $request)
    {
        $type = $this->repository->create($request);
        $request->session()->flash('success', __('Record created successfully'));
        return redirect(route('shops-types.edit', [$type->id]));
    }

    public function show(ShopType $type)
    {
        $type = $this->repository->find($type);
        return view('shops-types.show')
            ->with('type', $type);
    }

    public function edit(ShopType $type)
    {
        $type = $this->repository->find($type);
        return view('shops-types.edit')
            ->with('type', $type);
    }

    public function update(Request $request, $id)
    {
        $this->repository->update($request, $id);
        $request->session()->flash('success', __('Record updated successfully'));
        return redirect(route('shops-types.edit', [$id]));
    }

    public function destroy(Request $request, $id)
    {
        if ( $this->repository->canDelete($id) ) {
            $this->repository->delete($id);
            $request->session()->flash('success', __('Record deleted successfully'));
            return redirect(route('shops-types'));
        }

        $request->session()->flash('error', __("This record can't be deleted"));
        return redirect()->back();
    }
}
