<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    MyList,
    User
};
use App\Repositories\{
    ListsRepositoryInterface,
    UsersRepositoryInterface
};

class ListsController extends Controller
{
    private $repository;
    private $usersRepository;

    public function __construct(
        ListsRepositoryInterface $repository,
        UsersRepositoryInterface $usersRepository
    ){
        $this->repository = $repository;
        $this->usersRepository = $usersRepository;
    }

    public function index(Request $request)
    {
        $search = trim($request->s);
        $lists = $this->repository->all($search);

        return view('lists.index')
            ->with('lists', $lists)
            ->with('search', $search);
    }

    public function create()
    {
        $list = $this->repository->blueprint();
        $configUsers = ['paginate' => false];
        $users = $this->usersRepository->all('', $configUsers);
        return view('lists.create')
            ->with('list', $list)
            ->with('users', $users);
    }

    public function store(Request $request)
    {
        $list = $this->repository->create($request);
        $request->session()->flash('success', __('Record created successfully'));
        return redirect(route('lists.edit', [$list->id]));
    }

    public function show(MyList $list)
    {
        $list = $this->repository->find($list);
        return view('lists.show')
            ->with('list', $list);
    }

    public function edit(MyList $list)
    {
        $list = $this->repository->find($list);
        $configUsers = ['paginate' => false];
        $users = $this->usersRepository->all('', $configUsers);
        return view('lists.edit')
            ->with('list', $list)
            ->with('users', $users);
    }

    public function update(Request $request, $id)
    {
        $this->repository->update($request, $id);
        $request->session()->flash('success', __('Record updated successfully'));
        return redirect(route('lists.edit', [$id]));
    }

    public function destroy(Request $request, $id)
    {
        if ( $this->repository->canDelete($id) ) {
            $this->repository->delete($id);
            $request->session()->flash('success', __('Record deleted successfully'));
            return redirect(route('lists'));
        }

        $request->session()->flash('error', __("This record can't be deleted"));
        return redirect()->back();
    }
}
