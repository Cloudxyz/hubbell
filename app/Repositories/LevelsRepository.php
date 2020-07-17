<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Level;
use App\Repositories\LevelsRepositoryInterface;
use App\Validations\LevelsValidations;

class LevelsRepository implements LevelsRepositoryInterface
{
    protected $model;
    protected $validation;

    public function __construct(Level $level)
    {
        $this->model = $level;
        $this->validation = new LevelsValidations();
    }

    public function all($search = '', $config = [])
    {
        $shouldPaginate = isset($config['paginate']) ? $config['paginate'] : true;

        if ($search) {
            $query = 
                Level::where('name', 'like', "%".$search."%");
        } else {
            $query = Level::query();
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
            $level = $this->blueprint();
        } else {
            $level = $this->find($id);
        }

        $requestData = [
            'name' => $request->name
        ];

        $level->fill($requestData);

        $level->save();

        return $level;
    }

    public function find($id_or_obj)
    {
        $is_obj = is_object($id_or_obj);
        $level = ($is_obj) ? $id_or_obj : $this->model->find($id_or_obj);

        if (!$level) {
            throw new ModelNotFoundException("Level not found");
        }

        return $level;
    }
    
    public function delete($id)
    {
        $level = $this->model->find($id);
        
        if ($level && $this->canDelete($id)) {
            $level->delete();
        }

        return $level;
    }

    public function canDelete($id)
    {
        return true;
    }

    public function blueprint()
    {
        $level = new Level;

        return $level;
    }
}
