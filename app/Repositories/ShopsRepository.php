<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Repositories\ShopsRepositoryInterface;
use App\Validations\ShopsValidations;

class ShopsRepository implements ShopsRepositoryInterface
{
    protected $model;
    protected $validation;

    public function __construct(Shop $shop)
    {
        $this->model = $shop;
        $this->validation = new ShopsValidations();
    }

    public function all($search = '', $config = [])
    {
        $shouldPaginate = isset($config['paginate']) ? $config['paginate'] : true;

        if ($search) {
            $query = 
                Shop::where('name', 'like', "%".$search."%");
        } else {
            $query = Shop::query();
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
            $shop = $this->blueprint();
        } else {
            $shop = $this->find($id);
        }

        $requestData = $request->all();

        $shop->fill($requestData);

        $shop->save();

        return $shop;
    }

    public function find($id_or_obj)
    {
        $is_obj = is_object($id_or_obj);
        $shop = ($is_obj) ? $id_or_obj : $this->model->find($id_or_obj);

        if (!$shop) {
            throw new ModelNotFoundException("Shop not found");
        }

        return $shop;
    }
    
    public function delete($id)
    {
        $shop = $this->model->find($id);
        
        if ($shop && $this->canDelete($id)) {
            $shop->delete();
        }

        return $shop;
    }

    public function canDelete($id)
    {
        return true;
    }

    public function blueprint()
    {
        $shop = new Shop;

        return $shop;
    }
}
