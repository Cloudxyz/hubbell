<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\{
    Product,
    Image,
    ProductDetail,
    Resource
};
use App\Repositories\ProductsRepositoryInterface;
use App\Validations\ProductsValidations;
use App\Helpers\{
    ImagesHelper,
    ResourcesHelper
};

class ProductsRepository implements ProductsRepositoryInterface
{
    protected $model;
    protected $validation;

    public function __construct(Product $product)
    {
        $this->model = $product;
        $this->validation = new ProductsValidations();
    }

    public function all($search = '', $config = [])
    {
        $shouldPaginate = isset($config['paginate']) ? $config['paginate'] : true;

        if ($search) {
            $query =
                Product::where('name', 'like', "%" . $search . "%");
        } else {
            $query = Product::query();
        }

        $query->orderBy('name', 'asc');

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
            $product = $this->blueprint();
        } else {
            $product = $this->find($id);
        }

        if (!empty($request->slug)) {
            $slug = $request->slug;
        } else {
            $slug = deleteAccents($request->name);
        }

        if (!empty($request->catalog_id)) {
            $catalog_id = $request->catalog_id;
        } else {
            $catalog_id = $request->name;
        }

        $requestData = [
            'name' => $request->name,
            'slug' => $slug,
            'catalog_id' => $catalog_id,
            'short_description' => addslashes($request->short_description),
            'long_description' => addslashes($request->long_description)
        ];

        $product->fill($requestData);

        if ($product->save()) {

            $product->categories()->sync($request->categories_ids);
            $product->shops()->sync($request->shops_ids);

            //$currentImages = $product->images()->orderBy('order', 'ASC')->get();
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
                    $imgData = ImagesHelper::saveFile($img, 'images/products');
                    $image = new Image;
                    $image->slug = $imgData['slug'];
                    $image->extension = $imgData['extension'];
                    $image->file_original_name = $imgData['file_original_name'];
                    $image->file_name = $imgData['file_name'];
                    $image->file_path = $imgData['file_path'];
                    $image->file_url = $imgData['file_url'];
                    $image->order = $limitOrder++;

                    if ($image->save()) {
                        $product->images()->save($image);
                    }
                }
            }

            if ($request->section_resource) {
                foreach ($request->section_resource as $sectionResource) {
                    if (!array_key_exists('resource', $sectionResource)) {
                        continue;
                    }
                    $resourceData = ResourcesHelper::saveFile($sectionResource['resource'][0], 'resources');
                    $resource = new Resource;
                    $resource->title_section = $sectionResource['title'][0];
                    $resource->slug = $resourceData['slug'];
                    $resource->extension = $resourceData['extension'];
                    $resource->file_original_name = $resourceData['file_original_name'];
                    $resource->file_name = $resourceData['file_name'];
                    $resource->file_path = $resourceData['file_path'];
                    $resource->file_url = $resourceData['file_url'];
                    $resource->product_id = $product->id;
                    $resource->save();
                }
            }

            if ($request->list_dynamic) {
                foreach ($request->list_dynamic as $key => $dynamic) {
                    if ($dynamic['title_section'][0] == null) {
                        continue;
                    }

                    foreach ($dynamic['details'] as $detail) {
                        if ($detail['title'][0] == null || $detail['description'][0] == null) {
                            continue;
                        }
                        $productDetail = new ProductDetail;
                        $productDetail->title_section = $dynamic['title_section'][0];
                        $productDetail->title = $detail['title'][0];
                        $productDetail->description = $detail['description'][0];
                        $productDetail->product_id = $product->id;
                        $productDetail->save();
                    }
                }
            }

            if ($request->title_section_edit) {
                $editDetail = ProductDetail::where('id', $request->id_edit)->first();
                $editDetail->title_section = $request->title_section_edit;
                $editDetail->title = $request->title_edit;
                $editDetail->description = $request->description_edit;
                $editDetail->save();
            }

            /*if (!empty($request->resources)) {
                $product->resources()->create(['resources' => $request->resources]);
            }*/
        }

        return $product;
    }

    public function find($id_or_obj)
    {
        $is_obj = is_object($id_or_obj);
        $product = ($is_obj) ? $id_or_obj : $this->model->find($id_or_obj);

        if (!$product) {
            throw new ModelNotFoundException("Product not found");
        }

        return $product;
    }

    public function delete($id)
    {
        $product = $this->model->find($id);

        if ($product && $this->canDelete($id)) {
            foreach ($product->images()->get() as $image) {
                $image->delete();
                $product->images()->detach($image['id']);
                ImagesHelper::deleteFile($image['file_path']);
                ImagesHelper::deleteThumbnails($image['file_path']);
            }
            foreach ($product->resources()->get() as $resource) {
                $resource->delete();
                ResourcesHelper::deleteFile($resource['file_path']);
            }
            foreach ($product->details()->get() as $detail) {
                $detail->delete();
            }
            foreach ($product->myLists()->get() as $list) {
                $product->myLists()->detach($list->id);
            }
            $product->categories()->sync([]);
            $product->shops()->sync([]);
            $product->delete();
        }

        return $product;
    }

    public function canDelete($id)
    {
        return true;
    }

    public function blueprint()
    {
        $product = new Product;

        return $product;
    }
}
