<div class="rounded-box shadow-base-300/10 bg-base-100 w-full pb-2 shadow-md">
  <div class="overflow-x-auto">
    <table class="table">
      <caption class="text-base-content p-5 text-left text-lg font-semibold rtl:text-right">
        Berita Terbaru
        <p class="text-base-content/80 mt-1 text-sm font-normal">
          jalan pintas untuk mengelola berita terbaru
        </p>
      </caption>
      <thead>
        <tr>
          <th>Judul Berita</th>
          <th>Status</th>
          <th>Tanggal</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($this->articles as $article)
          <tr>
            <td>{{ $article->title }}</td>
            <td>
              @if ($article->published)
                <span class="badge badge-soft badge-success text-xs">Published</span>
              @else
                <span class="badge badge-soft badge-secondary text-xs">Draft</span>
              @endif
            </td>
            <td>{{ $article->created_at->translatedFormat('d F Y') }}</td>
            <td>
              <a class="btn btn-circle btn-text btn-sm btn-warning"
                href="{{ route('berita.edit', ['article' => $article->slug]) }}" aria-label="Action button">
                <span class="icon-[tabler--pencil] size-5"></span>
              </a>
              <button class="btn btn-circle btn-text btn-sm btn-error" aria-label="Action button"
                @click="$dispatch('delete-article', { article: '{{ $article->slug }}' })">
                <span class="icon-[tabler--trash] size-5"></span>
              </button>
            </td>
          </tr>
        @empty
          <tr>
            <td class="text-center" colspan="4">No articles found.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <livewire:dashboard.berita.delete redirectTo="dashboard" />
</div>
