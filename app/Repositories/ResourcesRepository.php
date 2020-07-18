<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Resource;
use App\Repositories\ResourcesRepositoryInterface;
use App\Validations\ResourcesValidations;

class ResourcesRepository implements ResourcesRepositoryInterface
{
    protected $model;
    protected $validation;

    public function __construct(Resource $resource)
    {
        $this->model = $resource;
        $this->validation = new ResourcesValidations();
    }

    public function all($search = '', $config = [])
    {
        $shouldPaginate = isset($config['paginate']) ? $config['paginate'] : true;

        if ($search) {
            $query = 
                Resource::where('name', 'like', "%".$search."%");
        } else {
            $query = Resource::query();
        }

        $query->orderBy('name', 'asc');

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
        $is_new = !$id;
        if ($is_new) {
            $resource = $this->blueprint();
        } else {
            $resource = $this->find($id);
        }

        if (!empty($request->slug)){
            $slug = $request->slug;
        }else {
            $slug = deleteAccents($request->name);
        }

        $requestData = [
            'name' => $request->name,
            'slug' => $slug,
            'level_id' => $request->level_id,
            'parent_id' => $request->parent_id,
            'has_products' => $request->has_products,
            'description' => $request->description
        ];

        $resource->fill($requestData);

        $resource->save();

        return $resource;
    }

    public function find($id_or_obj)
    {
        $is_obj = is_object($id_or_obj);
        $resource = ($is_obj) ? $id_or_obj : $this->model->find($id_or_obj);

        if (!$resource) {
            throw new ModelNotFoundException("Resource not found");
        }

        return $resource;
    }
    
    public function delete($id)
    {
        $resource = $this->model->find($id);
        
        if ($resource && $this->canDelete($id)) {
            $resource->delete();
        }

        return $resource;
    }

    public function canDelete($id)
    {
        return true;
    }

    public function blueprint()
    {
        $resource = new Resource;

        return $resource;
    }
}
