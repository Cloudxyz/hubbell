<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{ Product, Category, Image };
use App\Helpers\ImagesHelper;

class ImagesController extends Controller
{

    public function destroy(Request $request, $modelId, $id, $type = '')
    {
        if($type == 'products'){
            $model = Product::where('id', $modelId)->first();
            $route = 'products.edit';
        }else{
            $model = Category::where('id', $modelId)->first();
            $route = 'categories.edit';
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
