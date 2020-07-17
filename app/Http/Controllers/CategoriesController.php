<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\{
    CategoriesRepositoryInterface,
    LevelsRepositoryInterface
};
use App\Models\{
    Level,
    Category
};

class CategoriesController extends Controller
{
    private $repository;
    private $levelsRepository;

    public function __construct(
        CategoriesRepositoryInterface $repository,
        LevelsRepositoryInterface $levelsRepository
    )    {
        $this->repository = $repository;
        $this->levelsRepository = $levelsRepository;
    }

    public function index(Request $request)
    {
        $search = trim($request->s);
        $categories = $this->repository->all($search);

        return view('categories.index')
            ->with('categories', $categories)
            ->with('search', $search);
    }

    public function create()
    {
        $category = $this->repository->blueprint();
        $levels = $this->levelsRepository->all('');
        return view('categories.create')
            ->with('levels', $levels)
            ->with('category', $category);
    }

    public function store(Request $request)
    {
        $category = $this->repository->create($request);
        $request->session()->flash('success', __('Record created successfully'));
        return redirect(route('categories.edit', [$category->id]));
    }

    public function show(Category $category)
    {
        $category = $this->repository->find($category);
        $levels = $this->levelsRepository->all('');
        $parentCategories = 0;
        switch ($category->level_id){
            case 2;
                $parentCategories = Category::where('level_id', '1')->get();
                break;
            case 3;
                $parentCategories = Category::where('level_id', '2')->get();
                break;
            case 4;
                $parentCategories = Category::where('level_id', '3')->get();
                break;
            case 5;
                $parentCategories = Category::where('level_id', '4')->get();
                break;
        }

        return view('categories.show')
            ->with('levels', $levels)
            ->with('parentCategories', $parentCategories)
            ->with('category', $category);
    }

    public function edit(Category $category)
    {
        $category = $this->repository->find($category);
        $levels = $this->levelsRepository->all('');
        $parentCategories = 0;
        switch ($category->level_id){
            case 2;
                $parentCategories = Category::where('level_id', '1')->get();
                break;
            case 3;
                $parentCategories = Category::where('level_id', '2')->get();
                break;
            case 4;
                $parentCategories = Category::where('level_id', '3')->get();
                break;
            case 5;
                $parentCategories = Category::where('level_id', '4')->get();
                break;
        }

        return view('categories.edit')
            ->with('levels', $levels)
            ->with('parentCategories', $parentCategories)
            ->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        $this->repository->update($request, $id);
        $request->session()->flash('success', __('Record updated successfully'));
        return redirect(route('categories.edit', [$id]));
    }

    public function destroy(Request $request, $id)
    {
        if ( $this->repository->canDelete($id) ) {
            $this->repository->delete($id);
            $request->session()->flash('success', __('Record deleted successfully'));
            return redirect(route('categories'));
        }

        $request->session()->flash('error', __("This record can't be deleted"));
        return redirect()->back();
    }
}
