<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Facility\CreateFacilityRequest;
use App\Http\Requests\Facility\UpdateFacilityRequest;

class FacilityController extends Controller
{
    public function index(): View
    {
        return view('dashboard.fasilitas.index', [
            'facilities' => Facility::all(),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.fasilitas.create');
    }

    public function store(CreateFacilityRequest $request): RedirectResponse
    {
        $path = $request->file('image')->store('images/fasilitas');

        Facility::create([
            ...$request->validated(),
            'image' => $path,
        ]);

        return to_route('fasilitas.index');
    }

    public function edit(Facility $facility): View
    {
        return view('dashboard.fasilitas.edit', [
            'facility' => $facility,
        ]);
    }

    public function update(UpdateFacilityRequest $request, Facility $facility): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            Storage::delete($facility->image);
            $data['image'] = $request->file('image')->store('images/fasilitas');
        }

        $facility->update($data);

        return to_route('fasilitas.index');
    }

    public function destroy(Facility $facility): RedirectResponse
    {
        Storage::delete($facility->image);
        $facility->delete();

        return to_route('fasilitas.index');
    }
}
