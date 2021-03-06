<?php

namespace App\Repositories;

use Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Repositories\UsersRepositoryInterface;
use App\Models\{ Role, User };
use App\Validations\UsersValidations;

class UsersRepository implements UsersRepositoryInterface
{
    protected $model;
    protected $validation;

    public function __construct(User $user)
    {
        $this->model = $user;
        $this->validation = new UsersValidations();
    }

    public function all($search = '', $config = [])
    {
        $shouldPaginate = isset($config['paginate']) ? $config['paginate'] : true;

        if ($search) {
            $query = User::
                where('email', 'like', "%".$search."%")
                    ->orWhere('name', 'like', $search);
        } else {
            $query = User::query();
        }

        $query->orderBy('email', 'asc');

        if($shouldPaginate) {
            $result = $query->paginate( config('constants.pagination.per-page') );
        }else{
            $result = $query->get();
        }
        
        return $result;
    }

    public function create(Request $request)
    {
        $this->validation->validate('create', $request);
        return $this->save($request);
    }

    public function update(Request $request, $id)
    {
        $this->validation->validate('edit', $request, $id);
        return $this->save($request, $id);
    }

    public function save(Request $request, $id = '')
    {
        $is_new = ! $id;
        
        if($is_new){
            $user = $this->blueprint();
        }else{
            $user = $this->find($id);
        }
        
        $checkboxesConfig = ['is_enabled' => 0];
        $requestData = array_merge($checkboxesConfig, $request->all());

        $user->fill($requestData);

        // passsword
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        // roles assignation
        if ($request->roles_ids && is_array($request->roles_ids) && count($request->roles_ids)) {
            $validRolesIds = [2, 3, 4];
            $roles_to_assign = [];
            foreach ($request->roles_ids as $role_id) {
                $hasValidRole = in_array($role_id, $validRolesIds);
                if ($hasValidRole) {
                    $roles_to_assign[] = $role_id;
                }
            }

            // attach super admin role when super admin edits himself
            if ($user->id == 1) {   
                $roles_to_assign[] = 1;
            }

            $user->roles()->sync($roles_to_assign);
        }

        return $user;
    }

    public function find($id_or_obj)
    {
        $is_obj = is_object($id_or_obj);
        $user = ($is_obj) ? $id_or_obj : $this->model->find($id_or_obj);

        if (!$user) {
            throw new ModelNotFoundException("User not found");
        }

        return $user;
    }
    
    public function delete($id)
    {
        $user = $this->model->find($id);
        
        if ($user) {
            $user->delete();
        }

        return $user;
    }

    public function canDelete($id) {
        return ($id > 1); // to not delete super admin 
    }

    /**
     * Return the blueprint of the model including translation elements
     */
    public function blueprint()
    {
        return new User;
    }
}
