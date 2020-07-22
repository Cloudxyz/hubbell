<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Repositories\ImagesRepositoryInterface;
use App\Validations\ImagesValidations;
use App\Helpers\ImagesHelper;

class ImagesRepository implements ImagesRepositoryInterface
{
    protected $model;
    protected $validation;

    public function __construct(Image $image)
    {
        $this->model = $image;
        $this->validation = new ImagesValidations();
    }

    public function all($search = '', $config = [])
    {
        $shouldPaginate = isset($config['paginate']) ? $config['paginate'] : true;

        if ($search) {
            $query = 
                Image::where('name', 'like', "%".$search."%");
        } else {
            $query = Image::query();
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
            $image = $this->blueprint();
        } else {
            $image = $this->find($id);
        }

        $requestData = [
            'name' => $request->name
        ];

        $image->fill($requestData);

        $image->save();

        return $image;
    }

    public function find($id_or_obj)
    {
        $is_obj = is_object($id_or_obj);
        $image = ($is_obj) ? $id_or_obj : $this->model->find($id_or_obj);

        if (!$image) {
            throw new ModelNotFoundException("Image not found");
        }

        return $image;
    }
    
    public function delete($id)
    {
        $image = $this->model->find($id);

        if ($image && $this->canDelete($id)) {
            $image->delete();
            $image->products()->detach();
            ImagesHelper::deleteFile($image->file_path);
            ImagesHelper::deleteThumbnails($image->file_path);
        }

        return $image;
    }

    public function canDelete($id)
    {
        return true;
    }

    public function blueprint()
    {
        $image = new Image;

        return $image;
    }
}
