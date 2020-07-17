<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\MyList;
use App\Repositories\ListsRepositoryInterface;
use App\Validations\ListsValidations;

class ListsRepository implements ListsRepositoryInterface
{
    protected $model;
    protected $validation;

    public function __construct(MyList $list)
    {
        $this->model = $list;
        $this->validation = new ListsValidations();
    }

    public function all($search = '', $config = [])
    {
        $shouldPaginate = isset($config['paginate']) ? $config['paginate'] : true;

        if ($search) {
            $query = 
                MyList::where('name', 'like', "%".$search."%");
        } else {
            $query = MyList::query();
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
            $list = $this->blueprint();
        } else {
            $list = $this->find($id);
        }

        $requestData = $request->all();

        $list->fill($requestData);

        $list->save();

        return $list;
    }

    public function find($id_or_obj)
    {
        $is_obj = is_object($id_or_obj);
        $list = ($is_obj) ? $id_or_obj : $this->model->find($id_or_obj);

        if (!$list) {
            throw new ModelNotFoundException("MyList not found");
        }

        return $list;
    }
    
    public function delete($id)
    {
        $list = $this->model->find($id);
        
        if ($list && $this->canDelete($id)) {
            $list->delete();
        }

        return $list;
    }

    public function canDelete($id)
    {
        return true;
    }

    public function blueprint()
    {
        $list = new MyList;

        return $list;
    }
}
