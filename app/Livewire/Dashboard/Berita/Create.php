<?php

namespace App\Livewire\Dashboard\Berita;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Create extends Component
{
    use WithFileUploads;

    public string $title = '';

    public string $content = '';

    public ?TemporaryUploadedFile $thumbnail = null;

    public function save(): void
    {
        $data = Collection::make($this->validate());

        $data->put('thumbnail', $this->thumbnail->store('images/berita'));

        Article::create([...$data->all(), 'author_id' => Auth::id()]);

        $this->redirectRoute('berita.index');
    }

    protected function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'thumbnail' => ['required', File::image()->max(2048)],
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard.berita.create');
    }
}
