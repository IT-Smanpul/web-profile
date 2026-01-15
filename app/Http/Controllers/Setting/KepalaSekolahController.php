<?php

namespace App\Http\Controllers\Setting;

use App\Models\SchoolStructure;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Setting\UpdateKepalaSekolahRequest;

class KepalaSekolahController extends Controller
{
    public function editKepalaSekolah(): View
    {
        return view('dashboard.pengaturan.kepala-sekolah', [
            'title' => 'Pengaturan Kepala Sekolah - SMA Negeri 10 Pontianak',
            'kepalaSekolah' => SchoolStructure::where('role', 'kepala')->first(),
        ]);
    }

    public function updateKepalaSekolah(UpdateKepalaSekolahRequest $request)
    {
        $data = Collection::make($request->validated());
        $kepalaSekolah = SchoolStructure::where('role', 'kepala')->first();

        if ($request->hasFile('photo')) {
            if ($kepalaSekolah->photo && Storage::exists($kepalaSekolah->photo)) {
                Storage::delete($kepalaSekolah->photo);
            }

            $photo = $request->file('photo');
            $data->put('photo', $photo->storeAs('images/struktur', "Kepala Sekolah.{$photo->getClientOriginalExtension()}", 'public'));
        }

        SchoolStructure::updateOrCreate(['role' => 'kepala'], [
            ...$data->all(),
            'role' => 'kepala',
            'position' => 'Kepala Sekolah',
        ]);

        return to_route('setting.struktur.kepala-sekolah.edit');
    }
}
