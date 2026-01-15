<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Article\CreateArticleRequest;
use App\Http\Requests\Article\UpdateArticleRequest;

class ArticleController extends Controller
{
    private string $appName;

    public function __construct()
    {
        $this->appName = Config::get('app.name');
    }

    public function index(): View
    {
        return view('dashboard.berita.index', [
            'title' => "Berita - $this->appName",
            'articles' => Article::latest()->paginate(6),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.berita.create', [
            'title' => "Tambah Berita - $this->appName",
        ]);
    }

    public function store(CreateArticleRequest $request): RedirectResponse
    {
        $path = $request->file('thumbnail')->store('images/articles');

        Article::create([
            ...$request->validated(),
            'author_id' => Auth::id(),
            'thumbnail' => $path,
        ]);

        return to_route('berita.index');
    }

    public function show(Article $article): View
    {
        return view('berita.detail', [
            'title' => "$article->title - $this->appName",
            'article' => $article,
            'others' => Article::where('slug', '!=', $article->slug)->latest()->take(3)->get(),
        ]);
    }

    public function edit(Article $article): View
    {
        return view('dashboard.berita.edit', [
            'title' => "Edit Berita - $this->appName",
            'article' => $article,
        ]);
    }

    public function update(UpdateArticleRequest $request, Article $article): RedirectResponse
    {
        if ($request->hasFile('thumbnail')) {
            Storage::delete($article->thumbnail);
            $path = $request->file('thumbnail')->store('images/articles');

            $article->update([
                ...$request->validated(),
                'thumbnail' => $path,
            ]);
        } else {
            $article->update($request->validated());
        }

        return to_route('berita.index');
    }

    public function destroy(Article $article): RedirectResponse
    {
        Storage::delete($article->thumbnail);
        $article->delete();

        return to_route('berita.index');
    }

    public function preview(Article $article): View
    {
        return view('dashboard.berita.preview', [
            'title' => "Preview Berita - $this->appName",
            'article' => $article,
        ]);
    }
}
