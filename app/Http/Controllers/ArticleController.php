<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Config;

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

    public function preview(Article $article): View
    {
        return view('dashboard.berita.preview', [
            'title' => "Preview Berita - $this->appName",
            'article' => $article,
        ]);
    }
}
