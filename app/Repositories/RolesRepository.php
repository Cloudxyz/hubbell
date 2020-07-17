<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Repositories\RolesRepositoryInterface;
use App\Models\{ Role };


class RolesRepository implements RolesRepositoryInterface
{
    protected $model;

    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    public function all($search = '', $config = [])
    {
        $shouldPaginate = isset($config['paginate']) ? $config['paginate'] : true;
        $skipSuperAdmin = isset($config['skipSuperAdmin']) && $config['skipSuperAdmin'] === true;

        if ($search) {
            $query = 
                Role::
                    where('name', 'like', "%".$search."%");
        } else {
            $query = Role::query();
        }

        if ($skipSuperAdmin) {
            $query->where('id', '!=', config('constants.roles.super'));
        }
        
        $query
            ->orderBy('id', 'asc');

        if($shouldPaginate) {
            $result = $query->paginate( config('constants.pagination.per-page') );
        }else{
            $result = $query->get();
        }
        
        return $result;
    }

    public function find($id_or_obj)
    {
        $is_obj = is_object($id_or_obj);
        $role = ($is_obj) ? $id_or_obj : $this->model->find($id_or_obj);

        if (!$role) {
            throw new ModelNotFoundException("Role not found");
        }

        return $role;
    }

    public function create(Request $request){}
    public function update(Request $request, $id){}
    public function save(Request $request, $id){}
    public function delete($id){}
    public function canDelete($id){}
    public function blueprint(){}
}
