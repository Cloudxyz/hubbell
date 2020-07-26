<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Product, Resource};
use App\Helpers\ResourcesHelper;

class ResourcesController extends Controller
{

    public function destroy(Request $request, $modelId, $id, $type = '')
    {
        $model = Product::where('id', $modelId)->first();
        $route = 'products.edit';

        $resource = Resource::where('id', $id)->first();
        $resource->delete();
        ResourcesHelper::deleteFile($resource['file_path']);
        $request->session()->flash('success', __('Record deleted successfully'));
        return redirect(route($route, [$model['id']]));
    }
}
