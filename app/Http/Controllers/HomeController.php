<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use App\Models\Article;
use App\Models\Employee;
use App\Models\Facility;
use App\Models\Achievement;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function profil(): View
    {
        return view('profil', [
            'title' => $this->setTitle('Profil Sekolah'),
        ]);
    }

    public function guru(): View
    {
        return view('guru-staff', [
            'title' => $this->setTitle('Guru dan Staff'),
            'gurus' => Employee::guru()->latest()->get(),
            'staffs' => Employee::staff()->latest()->get(),
        ]);
    }

    public function fasilitas(): View
    {
        return view('fasilitas', [
            'title' => $this->setTitle('Fasilitas'),
            'facilities' => Facility::latest()->paginate(6),
        ]);
    }

    public function ekskul(): View
    {
        return view('ekskul', [
            'title' => $this->setTitle('Ekstrakurikuler'),
            'ekskuls' => Ekskul::latest()->paginate(6),
        ]);
    }

    public function prestasi(): View
    {
        return view('prestasi', [
            'title' => $this->setTitle('Prestasi'),
            'achievements' => Achievement::latest()->paginate(6),
        ]);
    }

    public function berita(): View
    {
        return view('berita.index', [
            'title' => $this->setTitle('Berita'),
            'articles' => Article::published()->latest()->paginate(6),
        ]);
    }

    public function kritikSaranMasukan(): View
    {
        return view('kritik-saran-masukan', [
            'title' => $this->setTitle('Kritik, Saran, dan Masukan'),
        ]);
    }
}
