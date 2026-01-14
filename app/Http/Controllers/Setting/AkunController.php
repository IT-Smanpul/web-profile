<?php

namespace App\Http\Controllers\Setting;

use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Setting\UpdateAkunRequest;

class AkunController extends Controller
{
    public function edit(): View
    {
        return view('dashboard.pengaturan.akun', [
            'title' => 'Pengaturan Akun - SMA Negeri 10 Pontianak',
        ]);
    }

    public function update(UpdateAkunRequest $request): RedirectResponse
    {
        $data = Collection::make($request->validated());

        if ($request->hasFile('photo')) {
            if (Auth::user()->photo && Storage::exists(Auth::user()->photo)) {
                Storage::delete(Auth::user()->photo);
            }

            $data->put('photo', $request->file('photo')->store('images/users'));
        }

        if ($request->filled('password')) {
            $data->put('password', Hash::make($request->get('password')));
        } else {
            $data->forget(['password']);
        }

        Auth::user()->update($data->toArray());

        return to_route('setting.akun.edit');
    }
}
