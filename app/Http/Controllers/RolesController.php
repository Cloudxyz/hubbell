<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\RoleHelper;
use App\Repositories\RolesRepositoryInterface;

class RolesController extends Controller
{
    private $repository;

    public function __construct(RolesRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $search = trim($request->s);
        $roles = $this->repository->all($search);
        return view('roles.index')
            ->with('roles', $roles)
            ->with('search', $search);
    }

    public function setActive($id) 
    { 
        RoleHelper::setActive($id);
        return redirect(route('dashboard'));
    }
}
