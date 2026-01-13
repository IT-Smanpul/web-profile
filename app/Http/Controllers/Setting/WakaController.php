<?php

namespace App\Http\Controllers\Setting;

use App\Models\SchoolStructure;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Setting\Waka\CreateWakaRequest;
use App\Http\Requests\Setting\Waka\UpdateWakaRequest;

class WakaController extends Controller
{
    public function index(): View
    {
        return view('dashboard.pengaturan.waka.index', [
            'title' => 'Pengaturan Wakil Kepala Sekolah - SMA Negeri 10 Pontianak',
            'wakilKepalaSekolah' => SchoolStructure::where('role', 'wakil')->get(),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.pengaturan.waka.create', [
            'title' => 'Tambah Wakil Kepala Sekolah - SMA Negeri 10 Pontianak',
        ]);
    }

    public function store(CreateWakaRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $data['photo'] = $photo->storeAs('images/struktur', "Wakil Kepala Sekolah - {$data['name']}.{$photo->getClientOriginalExtension()}");
        }

        SchoolStructure::create([
            ...$data,
            'role' => 'wakil',
        ]);

        return to_route('wakil-kepala-sekolah.index');
    }

    public function edit(SchoolStructure $waka): View
    {
        return view('dashboard.pengaturan.waka.edit', [
            'title' => 'Edit Wakil Kepala Sekolah - SMA Negeri 10 Pontianak',
            'waka' => $waka,
        ]);
    }

    public function update(UpdateWakaRequest $request, SchoolStructure $waka): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            if (Storage::exists($waka->photo)) {
                Storage::delete($waka->photo);
            }

            $photo = $request->file('photo');
            $data['photo'] = $photo->storeAs('images/struktur', "Wakil Kepala Sekolah - {$data['name']}.{$photo->getClientOriginalExtension()}");
        }

        $waka->update($data);

        return to_route('wakil-kepala-sekolah.index');
    }

    public function destroy(SchoolStructure $waka): RedirectResponse
    {
        Storage::delete($waka->photo);
        $waka->delete();

        return to_route('wakil-kepala-sekolah.index');
    }
}
