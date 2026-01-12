<?php

namespace App\Http\Controllers\Setting;

use App\Models\Setting;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\UpdateGeneralRequest;

class GeneralSettingController extends Controller
{
    public function edit(): View
    {
        return view('dashboard.pengaturan.general', [
            'title' => 'Pengaturan Umum - SMA Negeri 10 Pontianak',
            'school_name' => $this->getSetting('school_name'),
            'npsn' => $this->getSetting('npsn'),
            'school_status' => $this->getSetting('school_status'),
            'accreditation' => $this->getSetting('accreditation'),
            'curriculum' => $this->getSetting('curriculum'),
        ]);
    }

    public function update(UpdateGeneralRequest $request)
    {
        foreach ($request->validated() as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return to_route('setting.general.edit');
    }

    private function getSetting(string $key): ?string
    {
        return Setting::where('key', $key)->first()?->value;
    }
}
