<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Repositories\CategoriesRepositoryInterface;
use App\Validations\CategoriesValidations;

class CategoriesRepository implements CategoriesRepositoryInterface
{
    protected $model;
    protected $validation;

    public function __construct(Category $category)
    {
        $this->model = $category;
        $this->validation = new CategoriesValidations();
    }

    public function all($search = '', $config = [])
    {
        $shouldPaginate = isset($config['paginate']) ? $config['paginate'] : true;

        if ($search) {
            $query = 
                Category::where('name', 'like', "%".$search."%");
        } else {
            $query = Category::query();
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
            $category = $this->blueprint();
        } else {
            $category = $this->find($id);
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

        $category->fill($requestData);

        $category->save();

        return $category;
    }

    public function find($id_or_obj)
    {
        $is_obj = is_object($id_or_obj);
        $category = ($is_obj) ? $id_or_obj : $this->model->find($id_or_obj);

        if (!$category) {
            throw new ModelNotFoundException("Category not found");
        }

        return $category;
    }
    
    public function delete($id)
    {
        $category = $this->model->find($id);
        
        if ($category && $this->canDelete($id)) {
            $category->delete();
        }

        return $category;
    }

    public function canDelete($id)
    {
        return true;
    }

    public function blueprint()
    {
        $category = new Category;

        return $category;
    }
}
