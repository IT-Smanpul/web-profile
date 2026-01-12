<?php

namespace App\Http\Controllers\Setting;

use App\Models\Mission;
use App\Models\Setting;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Setting\UpdateVisiMisiRequest;

class VisiMisiSettingController extends Controller
{
    public function edit(): View
    {
        return view('dashboard.pengaturan.visi-misi', [
            'title' => 'Pengaturan Visi Misi - SMA Negeri 10 Pontianak',
            'vision' => Setting::where('key', 'vision')->value('value'),
            'missions' => Mission::all(),
        ]);
    }

    public function update(UpdateVisiMisiRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // Update Visi
        Setting::updateOrCreate(['key' => 'vision'], ['value' => $data['vision']]);

        // Update Misi
        Mission::truncate();
        foreach ($data['missions'] as $mission) {
            Mission::create(['content' => $mission]);
        }

        return to_route('setting.visi-misi.edit');
    }
}
