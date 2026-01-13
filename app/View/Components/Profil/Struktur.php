<?php

namespace App\View\Components\Profil;

use Closure;
use Illuminate\View\Component;
use App\Models\SchoolStructure;
use Illuminate\Contracts\View\View;

class Struktur extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.profil.struktur', [
            'kepalaSekolah' => SchoolStructure::where('role', 'kepala')->first(),
            'wakas' => SchoolStructure::where('role', 'wakil')->get(),
        ]);
    }
}
