<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Product, Category, Post, Image};
use App\Helpers\ImagesHelper;

class ImagesController extends Controller
{

    public function destroy(Request $request, $modelId, $id, $type = '')
    {
        if ($type == 'products') {
            $model = Product::where('id', $modelId)->first();
            $route = 'products.edit';
        } else if ($type == 'categories') {
            $model = Category::where('id', $modelId)->first();
            $route = 'categories.edit';
        } else {
            $model = Post::where('id', $modelId)->first();
            $route = 'posts.edit';
        }

        $image = Image::where('id', $id)->first();
        $image->delete();
        $model->images()->detach($image['id']);
        ImagesHelper::deleteFile($image['file_path']);
        ImagesHelper::deleteThumbnails($image['file_path']);
        $request->session()->flash('success', __('Record deleted successfully'));
        return redirect(route($route, [$model['id']]));
    }
}
