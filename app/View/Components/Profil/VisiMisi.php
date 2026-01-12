<?php

namespace App\View\Components\Profil;

use Closure;
use App\Models\Mission;
use App\Models\Setting;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class VisiMisi extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.profil.visi-misi', [
            'vision' => $this->getVision(),
            'missions' => Mission::all(),
        ]);
    }

    private function getVision(): ?string
    {
        return Setting::where('key', 'vision')->first()?->value;
    }
}
