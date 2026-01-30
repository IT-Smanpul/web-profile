<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Article;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index(): View
    {
        return view('dashboard.berita.index', [
            'title' => $this->setTitle('List Berita'),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.berita.create', [
            'title' => $this->setTitle('Tambah Berita'),
        ]);
    }

    public function show(Article $article): View
    {
        return view('berita.detail', [
            'title' => $this->setTitle($article->title),
            'article' => $article,
            'others' => Article::where('slug', '!=', $article->slug)->latest()->take(3)->get(),
        ]);
    }

    public function edit(Article $article): View
    {
        return view('dashboard.berita.edit', [
            'title' => $this->setTitle('Edit Berita'),
            'article' => $article,
        ]);
    }
}
