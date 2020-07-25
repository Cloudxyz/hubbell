<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Repositories\TagsRepositoryInterface;
use App\Validations\TagsValidations;

class TagsRepository implements TagsRepositoryInterface
{
    protected $model;
    protected $validation;

    public function __construct(Tag $tag)
    {
        $this->model = $tag;
        $this->validation = new TagsValidations();
    }

    public function all($search = '', $config = [])
    {
        $shouldPaginate = isset($config['paginate']) ? $config['paginate'] : true;

        if ($search) {
            $query = 
                Tag::where('name', 'like', "%".$search."%");
        } else {
            $query = Tag::query();
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
            $tag = $this->blueprint();
        } else {
            $tag = $this->find($id);
        }

        $requestData = [
            'name' => $request->name
        ];

        $tag->fill($requestData);

        $tag->save();

        return $tag;
    }

    public function find($id_or_obj)
    {
        $is_obj = is_object($id_or_obj);
        $tag = ($is_obj) ? $id_or_obj : $this->model->find($id_or_obj);

        if (!$tag) {
            throw new ModelNotFoundException("Tag not found");
        }

        return $tag;
    }
    
    public function delete($id)
    {
        $tag = $this->model->find($id);
        
        if ($tag && $this->canDelete($id)) {
            $tag->posts()->sync([]);
            $tag->delete();
        }

        return $tag;
    }

    public function canDelete($id)
    {
        return true;
    }

    public function blueprint()
    {
        $tag = new Tag;

        return $tag;
    }
}
