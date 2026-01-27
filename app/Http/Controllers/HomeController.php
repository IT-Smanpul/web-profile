<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use App\Models\Article;
use App\Models\Facility;
use App\Models\Achievement;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function fasilitas(): View
    {
        return view('fasilitas', [
            'title' => "Fasilitas - $this->appName",
            'facilities' => Facility::paginate(6),
        ]);
    }

    public function ekskul(): View
    {
        return view('ekskul', [
            'title' => "Ekstrakurikuler - $this->appName",
            'ekskuls' => Ekskul::paginate(6),
        ]);
    }

    public function prestasi(): View
    {
        return view('prestasi', [
            'title' => "Prestasi - $this->appName",
            'achievements' => Achievement::paginate(6),
        ]);
    }

    public function berita(): View
    {
        return view('berita.index', [
            'title' => "Berita - $this->appName",
            'articles' => Article::published()->latest()->paginate(6),
        ]);
    }
}
