<?php

namespace App\Livewire\Dashboard\Berita;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Collection;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Edit extends Component
{
    use WithFileUploads;

    public string $title = '';

    public string $content = '';

    public ?Article $article = null;

    public ?TemporaryUploadedFile $thumbnail = null;

    public function mount(Article $article): void
    {
        $this->article = $article;

        $this->fill($article->except('thumbnail'));
    }

    public function save(): void
    {
        $data = Collection::make($this->validate());

        if (! blank($data->get('thumbnail'))) {
            if (Storage::exists($this->article->thumbnail)) {
                Storage::delete($this->article->thumbnail);
            }

            $data->put('thumbnail', $this->thumbnail->store('images/berita'));
        } else {
            $data->forget(['thumbnail']);
        }

        $this->article?->update($data->all());

        $this->redirectRoute('berita.index');
    }

    protected function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'thumbnail' => ['nullable', File::image()->max(2048)],
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard.berita.edit');
    }
}
