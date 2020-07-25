<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Repositories\{
    PostsRepositoryInterface,
    TagsRepositoryInterface
};

class PostsController extends Controller
{
    private $repository;
    private $tagsRepository;

    public function __construct(
        PostsRepositoryInterface $repository,
        TagsRepositoryInterface $tagsRepository
    ) {
        $this->repository = $repository;
        $this->tagsRepository = $tagsRepository;
    }

    public function index(Request $request)
    {
        $search = trim($request->s);
        $posts = $this->repository->all($search);

        return view('posts.index')
            ->with('posts', $posts)
            ->with('search', $search);
    }

    public function create()
    {
        $post = $this->repository->blueprint();
        $tags = $this->tagsRepository->all('');
        return view('posts.create')
            ->with('tags', $tags)
            ->with('post', $post);
    }

    public function store(Request $request)
    {
        $post = $this->repository->create($request);
        $request->session()->flash('success', __('Record created successfully'));
        return redirect(route('posts.edit', [$post->id]));
    }

    public function show(Post $post)
    {
        $post = $this->repository->find($post);
        $tags = $this->tagsRepository->all('');
        return view('posts.show')
            ->with('tags', $tags)
            ->with('post', $post);
    }

    public function edit(Post $post)
    {
        $post = $this->repository->find($post);
        $tags = $this->tagsRepository->all('');
        return view('posts.edit')
            ->with('tags', $tags)
            ->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        $this->repository->update($request, $id);
        $request->session()->flash('success', __('Record updated successfully'));
        return redirect(route('posts.edit', [$id]));
    }

    public function destroy(Request $request, $id)
    {
        if ($this->repository->canDelete($id)) {
            $this->repository->delete($id);
            $request->session()->flash('success', __('Record deleted successfully'));
            return redirect(route('posts'));
        }

        $request->session()->flash('error', __("This record can't be deleted"));
        return redirect()->back();
    }
}
