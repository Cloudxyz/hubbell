<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\ShopType;
use App\Repositories\ShopsTypesRepositoryInterface;
use App\Validations\ShopsTypesValidations;

class ShopsTypesRepository implements ShopsTypesRepositoryInterface
{
    protected $model;
    protected $validation;

    public function __construct(ShopType $shopType)
    {
        $this->model = $shopType;
        $this->validation = new ShopsTypesValidations();
    }

    public function all($search = '', $config = [])
    {
        $shouldPaginate = isset($config['paginate']) ? $config['paginate'] : true;

        if ($search) {
            $query = 
                ShopType::where('name', 'like', "%".$search."%");
        } else {
            $query = ShopType::query();
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
            $shopType = $this->blueprint();
        } else {
            $shopType = $this->find($id);
        }

        $requestData = $request->all();

        $shopType->fill($requestData);

        $shopType->save();

        return $shopType;
    }

    public function find($id_or_obj)
    {
        $is_obj = is_object($id_or_obj);
        $shopType = ($is_obj) ? $id_or_obj : $this->model->find($id_or_obj);

        if (!$shopType) {
            throw new ModelNotFoundException("Shop not found");
        }

        return $shopType;
    }
    
    public function delete($id)
    {
        $shopType = $this->model->find($id);
        
        if ($shopType && $this->canDelete($id)) {
            $shopType->delete();
        }

        return $shopType;
    }

    public function canDelete($id)
    {
        return true;
    }

    public function blueprint()
    {
        $shopType = new ShopType;

        return $shopType;
    }
}
