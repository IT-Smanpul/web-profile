<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Achievement\CreateAchievementRequest;
use App\Http\Requests\Achievement\UpdateAchievementRequest;

class AchievementController extends Controller
{
    public function index(): View
    {
        return view('dashboard.prestasi.index', [
            'achievements' => Achievement::all(),
        ]);
    }

    public function create(): View
    {
        return view('dashboard.prestasi.create');
    }

    public function store(CreateAchievementRequest $request): RedirectResponse
    {
        $path = $request->file('image')->store('images/prestasi');

        Achievement::create([
            ...$request->validated(),
            'image' => $path,
        ]);

        return to_route('prestasi.index');
    }

    public function edit(Achievement $achievement): View
    {
        return view('dashboard.prestasi.edit', [
            'achievement' => $achievement,
        ]);
    }

    public function update(UpdateAchievementRequest $request, Achievement $achievement)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            Storage::delete($achievement->image);
            $data['image'] = $request->file('image')->store('images/prestasi');
        }

        $achievement->update($data);

        return to_route('prestasi.index');
    }

    public function destroy(Achievement $achievement): RedirectResponse
    {
        Storage::delete($achievement->image);
        $achievement->delete();

        return to_route('prestasi.index');
    }
}
