<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Shop,
    User
};
use App\Repositories\{
    ShopsRepositoryInterface,
    UsersRepositoryInterface
};

class ShopsController extends Controller
{
    private $repository;
    private $usersRepository;

    public function __construct(
        ShopsRepositoryInterface $repository,
        UsersRepositoryInterface $usersRepository
    ){
        $this->repository = $repository;
        $this->usersRepository = $usersRepository;
    }

    public function index(Request $request)
    {
        $search = trim($request->s);
        $shops = $this->repository->all($search);

        return view('shops.index')
            ->with('shops', $shops)
            ->with('search', $search);
    }

    public function create()
    {
        $shop = $this->repository->blueprint();
        $configUsers = ['paginate' => false];
        $users = $this->usersRepository->all('', $configUsers);
        return view('shops.create')
            ->with('shop', $shop)
            ->with('users', $users);
    }

    public function store(Request $request)
    {
        $shop = $this->repository->create($request);
        $request->session()->flash('success', __('Record created successfully'));
        return redirect(route('shops.edit', [$shop->id]));
    }

    public function show(Shop $shop)
    {
        $shop = $this->repository->find($shop);
        return view('shops.show')
            ->with('shop', $shop);
    }

    public function edit(Shop $shop)
    {
        $shop = $this->repository->find($shop);
        $configUsers = ['paginate' => false];
        $users = $this->usersRepository->all('', $configUsers);
        return view('shops.edit')
            ->with('shop', $shop)
            ->with('users', $users);
    }

    public function update(Request $request, $id)
    {
        $this->repository->update($request, $id);
        $request->session()->flash('success', __('Record updated successfully'));
        return redirect(route('shops.edit', [$id]));
    }

    public function destroy(Request $request, $id)
    {
        if ( $this->repository->canDelete($id) ) {
            $this->repository->delete($id);
            $request->session()->flash('success', __('Record deleted successfully'));
            return redirect(route('shops'));
        }

        $request->session()->flash('error', __("This record can't be deleted"));
        return redirect()->back();
    }
}
