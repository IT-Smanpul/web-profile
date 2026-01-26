<header class="border-base-content/20 bg-base-100 fixed top-0 z-10 w-full border-b py-px">
  <nav class="navbar mx-auto max-w-7xl rounded-b-xl px-4 sm:px-6 lg:px-8">
    <div class="w-full lg:flex lg:items-center lg:gap-2">
      <div class="navbar-start items-center justify-between max-lg:w-full">
        <a class="text-base-content flex items-center gap-3 text-xl font-semibold" href="/">
          <img class="size-12" src="{{ asset('img/logo.png') }}" alt="Logo Sekolah">
          SMAN 10 Pontianak
        </a>
        <div class="flex items-center gap-5 lg:hidden">
          <a class="btn btn-primary btn-sm" href="/">SIMPUL</a>
          <button class="collapse-toggle btn btn-outline btn-secondary btn-square" data-collapse="#navbar-block-4"
            type="button" aria-controls="navbar-block-4" aria-label="Toggle navigation">
            <span class="icon-[tabler--menu-2] collapse-open:hidden size-5.5"></span>
            <span class="icon-[tabler--x] collapse-open:block size-5.5 hidden"></span>
          </button>
        </div>
      </div>
      <div
        class="lg:navbar-center transition-height collapse hidden grow overflow-hidden font-medium duration-300 lg:flex"
        id="navbar-block-4">
        <div class="text-base-content flex gap-6 text-base max-lg:mt-4 max-lg:flex-col lg:items-center">
          <a href="/" @class([
              'hover:text-primary nav-link',
              'text-primary' => Request::is('/'),
          ])>Beranda</a>
          <a href="{{ route('profil') }}" @class([
              'hover:text-primary nav-link',
              'text-primary' => Route::is('profil'),
          ])>
            Profil Sekolah
          </a>
          <a href="{{ route('fasilitas') }}" @class([
              'hover:text-primary nav-link',
              'text-primary' => Route::is('fasilitas'),
          ])>
            Fasilitas
          </a>
          <a href="{{ route('ekskul') }}" @class([
              'hover:text-primary nav-link',
              'text-primary' => Route::is('ekskul'),
          ])>
            Ekskul
          </a>
          <a href="{{ route('prestasi') }}" @class([
              'hover:text-primary nav-link',
              'text-primary' => Route::is('prestasi'),
          ])>
            Prestasi
          </a>
          <a href="{{ route('berita') }}" @class([
              'hover:text-primary nav-link',
              'text-primary' => Route::is('berita'),
          ])>
            Berita
          </a>
        </div>
      </div>
      <div class="navbar-end max-lg:hidden">
        <a class="btn btn-primary" href="/">SIMPUL</a>
      </div>
    </div>
  </nav>
</header>
