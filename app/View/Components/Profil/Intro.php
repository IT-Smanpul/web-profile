<?php

namespace App\View\Components\Profil;

use Closure;
use App\Models\Setting;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Intro extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        return view('components.profil.intro', [
            'npsn' => $this->getSetting('npsn'),
            'status' => $this->getSetting('school_status'),
            'akreditasi' => $this->getSetting('accreditation'),
            'kurikulum' => $this->getSetting('curriculum'),
        ]);
    }

    private function getSetting(string $key): ?string
    {
        $setting = Setting::where('key', $key)->first();

        return $setting?->value;
    }
}
