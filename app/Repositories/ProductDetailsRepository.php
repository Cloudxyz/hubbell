<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Repositories\ProductDetailsRepositoryInterface;
use App\Validations\ProductDetailsValidations;

class ProductDetailsRepository implements ProductDetailsRepositoryInterface
{
    protected $model;
    protected $validation;

    public function __construct(ProductDetail $productDetail)
    {
        $this->model = $productDetail;
        $this->validation = new ProductDetailsValidations();
    }

    public function all($search = '', $config = [])
    {
        $shouldPaginate = isset($config['paginate']) ? $config['paginate'] : true;

        if ($search) {
            $query = 
                ProductDetail::where('title', 'like', "%".$search."%");
        } else {
            $query = ProductDetail::query();
        }

        $query->orderBy('title', 'asc');

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
            $productDetail = $this->blueprint();
        } else {
            $productDetail = $this->find($id);
        }

        $requestData = $request->all();

        $productDetail->fill($requestData);

        $productDetail->save();

        return $productDetail;
    }

    public function find($id_or_obj)
    {
        $is_obj = is_object($id_or_obj);
        $productDetail = ($is_obj) ? $id_or_obj : $this->model->find($id_or_obj);

        if (!$productDetail) {
            throw new ModelNotFoundException("ProductDetail not found");
        }

        return $productDetail;
    }
    
    public function delete($id)
    {
        $productDetail = $this->model->find($id);
        
        if ($productDetail && $this->canDelete($id)) {
            $productDetail->delete();
        }

        return $productDetail;
    }

    public function canDelete($id)
    {
        return true;
    }

    public function blueprint()
    {
        $productDetail = new ProductDetail;

        return $productDetail;
    }
}
