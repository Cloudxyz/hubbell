<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\{
    Post,
    Image
};
use App\Repositories\PostsRepositoryInterface;
use App\Validations\PostsValidations;
use App\Helpers\ImagesHelper;

class PostsRepository implements PostsRepositoryInterface
{
    protected $model;
    protected $validation;

    public function __construct(Post $post)
    {
        $this->model = $post;
        $this->validation = new PostsValidations();
    }

    public function all($search = '', $config = [])
    {
        $shouldPaginate = isset($config['paginate']) ? $config['paginate'] : true;

        if ($search) {
            $query =
                Post::where('title', 'like', "%" . $search . "%");
        } else {
            $query = Post::query();
        }

        $query->orderBy('title', 'asc');

        if ($shouldPaginate) {
            $result = $query->paginate(config('constants.pagination.per-page'));
        } else {
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
            $post = $this->blueprint();
        } else {
            $post = $this->find($id);
        }

        if (!empty($request->slug)) {
            $slug = $request->slug;
        } else {
            $slug = deleteAccents($request->title);
        }

        $requestData = [
            'title' => $request->title,
            'slug' => $slug,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'is_feature' => $request->is_feature,
            'is_active' => $request->is_active
        ];

        $post->fill($requestData);

        if ($post->save()) {
            $post->tags()->sync($request->tags_ids);

            $currentImages = json_decode($request->sort_files);
            array_multisort(array_column($currentImages, "order"), SORT_ASC, $currentImages);
            $limitOrder = 1;

            foreach ($currentImages as $index => $currentImage) {
                $getImage = Image::where('id', $currentImage->id)->first();
                $getImage->order = $limitOrder++;
                $getImage->save();
            }

            if ($request->hasFile('images')) {

                foreach ($request->images as $img) {
                    $imgData = ImagesHelper::saveFile($img, 'images/posts');
                    $image = new Image;
                    $image->slug = $imgData['slug'];
                    $image->extension = $imgData['extension'];
                    $image->file_original_name = $imgData['file_original_name'];
                    $image->file_name = $imgData['file_name'];
                    $image->file_path = $imgData['file_path'];
                    $image->file_url = $imgData['file_url'];
                    $image->order = $limitOrder++;

                    if ($image->save()) {
                        $post->images()->save($image);
                    }
                }
            }
        };

        return $post;
    }

    public function find($id_or_obj)
    {
        $is_obj = is_object($id_or_obj);
        $post = ($is_obj) ? $id_or_obj : $this->model->find($id_or_obj);

        if (!$post) {
            throw new ModelNotFoundException("Post not found");
        }

        return $post;
    }

    public function delete($id)
    {
        $post = $this->model->find($id);

        if ($post && $this->canDelete($id)) {
            $post->tags()->sync([]);
            $post->delete();
        }

        return $post;
    }

    public function canDelete($id)
    {
        return true;
    }

    public function blueprint()
    {
        $post = new Post;

        return $post;
    }
}
