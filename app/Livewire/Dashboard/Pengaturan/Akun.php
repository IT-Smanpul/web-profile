<?php

namespace App\Livewire\Dashboard\Pengaturan;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Akun extends Component
{
    use WithFileUploads;

    public string $name = '';

    public string $username = '';

    public string $password = '';

    public string $password_confirmation = '';

    public ?TemporaryUploadedFile $photo = null;

    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->username = Auth::user()->username;
    }

    public function save(): void
    {
        $data = Collection::make($this->validate());

        if (! blank($data->get('password'))) {
            $data->put('password', Hash::make($data->get('password')));
        } else {
            $data->forget(['password']);
        }

        if (! blank($data->get('photo'))) {
            if (Auth::user()->photo && Storage::exists(Auth::user()->photo)) {
                Storage::delete(Auth::user()->photo);
            }

            $data->put('photo', $this->photo->store('images/users'));
        } else {
            $data->forget(['photo']);
        }

        Auth::user()->update($data->all());

        $this->redirectRoute('setting.akun.edit');
    }

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users', 'username')->ignore(Auth::id())],
            'password' => ['nullable', 'confirmed', Password::min(6)],
            'photo' => ['nullable', File::image()->max(2048)],
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard.pengaturan.akun');
    }
}
