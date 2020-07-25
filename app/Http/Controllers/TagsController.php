<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Repositories\TagsRepositoryInterface;

class TagsController extends Controller
{
    private $repository;
    public function __construct(
        TagsRepositoryInterface $repository
    ){
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $search = trim($request->s);
        $tags = $this->repository->all($search);

        return view('tags.index')
            ->with('tags', $tags)
            ->with('search', $search);
    }

    public function create()
    {
        $tag = $this->repository->blueprint();
        return view('tags.create')
            ->with('tag', $tag);
    }

    public function store(Request $request)
    {
        $tag = $this->repository->create($request);
        $request->session()->flash('success', __('Record created successfully'));
        return redirect(route('tags.edit', [$tag->id]));
    }

    public function show(Tag $tag)
    {
        $tag = $this->repository->find($tag);
        return view('tags.show')
            ->with('tag', $tag);
    }

    public function edit(Tag $tag)
    {
        $tag = $this->repository->find($tag);
        return view('tags.edit')
            ->with('tag', $tag);
    }

    public function update(Request $request, $id)
    {
        $this->repository->update($request, $id);
        $request->session()->flash('success', __('Record updated successfully'));
        return redirect(route('tags.edit', [$id]));
    }

    public function destroy(Request $request, $id)
    {
        if ( $this->repository->canDelete($id) ) {
            $this->repository->delete($id);
            $request->session()->flash('success', __('Record deleted successfully'));
            return redirect(route('tags'));
        }

        $request->session()->flash('error', __("This record can't be deleted"));
        return redirect()->back();
    }
}
