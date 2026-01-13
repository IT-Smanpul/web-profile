<?php

namespace App\Http\Controllers\Setting;

use App\Models\SchoolStructure;
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
        $kepalaSekolah = SchoolStructure::where('role', 'kepala')->first();
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            if (Storage::exists($kepalaSekolah->photo)) {
                Storage::delete($kepalaSekolah->photo);
            }

            $photo = $request->file('photo');
            $data['photo'] = $photo->storeAs('images/struktur', "Kepala Sekolah.{$photo->getClientOriginalExtension()}", 'public');
        }

        SchoolStructure::updateOrCreate(['role' => 'kepala'], [
            ...$data,
            'role' => 'kepala',
            'position' => 'Kepala Sekolah',
        ]);

        return to_route('setting.struktur.kepala-sekolah.update');
    }
}
