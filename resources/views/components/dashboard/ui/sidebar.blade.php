<aside
  class="overlay overlay-open:translate-x-0 drawer drawer-start sm:w-75 inset-y-0 start-0 hidden h-full [--auto-close:lg] lg:z-50 lg:block lg:translate-x-0 lg:shadow-none"
  id="layout-sidebar" aria-label="Sidebar" tabindex="-1">
  <div class="drawer-body border-base-content/20 h-full border-e p-0">
    <div class="flex h-full max-h-full flex-col">
      <button class="btn btn-text btn-circle btn-sm absolute end-3 top-3 lg:hidden" data-overlay="#layout-sidebar"
        type="button" aria-label="Close">
        <span class="icon-[tabler--x] size-4.5"></span>
      </button>
      <div class="text-base-content border-base-content/20 flex flex-col items-center gap-4 border-b px-4 py-6">
        <div class="avatar">
          <div class="size-17 rounded-full">
            <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('img/avatars/8.png') }}"
              alt="avatar" />
          </div>
        </div>
        <div class="text-center">
          <h3 class="text-base-content text-lg font-semibold">{{ Auth::user()->name }}</h3>
          <p class="text-base-content/80">{{ Auth::user()->username }}</p>
        </div>
      </div>
      <div class="h-full overflow-y-auto">
        <ul class="accordion menu menu-sm gap-1 p-3">
          <li>
            <a href="{{ route('dashboard') }}" @class(['px-2', 'menu-active' => Route::is('dashboard')])>
              <span class="icon-[tabler--layout-dashboard] size-4.5"></span>
              <span class="grow">Dashboard</span>
            </a>
          </li>
          <li
            class="text-base-content/50 before:bg-base-content/20 mt-2 p-2 text-xs uppercase before:absolute before:-start-3 before:top-1/2 before:h-0.5 before:w-2.5">
            Menu Utama
          </li>
          <li>
            <a href="{{ route('berita.index') }}" @class([
                'px-2',
                'menu-active' =>
                    Route::is('berita.index') ||
                    Route::is('berita.create') ||
                    Route::is('berita.edit'),
            ])>
              <span class="icon-[tabler--news] size-4.5"></span>
              <span class="grow">Berita</span>
            </a>
          </li>
          <li>
            <a href="{{ route('prestasi.index') }}" @class([
                'px-2',
                'menu-active' =>
                    Route::is('prestasi.index') ||
                    Route::is('prestasi.create') ||
                    Route::is('prestasi.edit'),
            ])>
              <span class="icon-[tabler--award] size-4.5"></span>
              <span class="grow">Prestasi</span>
            </a>
          </li>
          <li>
            <a href="{{ route('fasilitas.index') }}" @class([
                'px-2',
                'menu-active' =>
                    Route::is('fasilitas.index') ||
                    Route::is('fasilitas.create') ||
                    Route::is('fasilitas.edit'),
            ])>
              <span class="icon-[tabler--building] size-4.5"></span>
              <span class="grow">Fasilitas</span>
            </a>
          </li>
          <li>
            <a href="{{ route('ekskul.index') }}" @class([
                'px-2',
                'menu-active' =>
                    Route::is('ekskul.index') ||
                    Route::is('ekskul.create') ||
                    Route::is('ekskul.edit'),
            ])>
              <span class="icon-[tabler--compass] size-4.5"></span>
              <span class="grow">Ekstrakurikuler</span>
            </a>
          </li>
          <li>
            <a href="{{ route('guru-staff.index') }}" @class([
                'px-2',
                'menu-active' =>
                    Route::is('guru-staff.index') ||
                    Route::is('guru-staff.create') ||
                    Route::is('guru-staff.edit'),
            ])>
              <span class="icon-[tabler--users-group] size-4.5"></span>
              <span class="grow">Guru dan Staff</span>
            </a>
          </li>

          <li
            class="text-base-content/50 before:bg-base-content/20 mt-2 p-2 text-xs uppercase before:absolute before:-start-3 before:top-1/2 before:h-0.5 before:w-2.5">
            Pengaturan
          </li>
          <li>
            <a href="{{ route('setting.general.edit') }}" @class([
                'inline-flex w-full items-center px-2',
                'menu-active' => Route::is('setting.general.edit'),
            ])>
              <span class="icon-[tabler--info-circle] size-4.5"></span>
              <span class="grow">Informasi Umum</span>
            </a>
          </li>
          <li>
            <a href="{{ route('setting.visi-misi.edit') }}" @class([
                'inline-flex w-full items-center px-2',
                'menu-active' => Route::is('setting.visi-misi.edit'),
            ])>
              <span class="icon-[tabler--telescope] size-4.5"></span>
              <span class="grow">Visi dan Misi</span>
            </a>
          </li>
          <li id="app-user-view" @class([
              'accordion-item',
              'active' =>
                  Route::is('setting.struktur.kepala-sekolah.edit') ||
                  Route::is('wakil-kepala-sekolah.index') ||
                  Route::is('wakil-kepala-sekolah.create') ||
                  Route::is('wakil-kepala-sekolah.edit'),
          ])>
            <button
              class="accordion-toggle accordion-item-active:bg-neutral/10 inline-flex w-full items-center p-2 text-start text-sm font-normal"
              aria-controls="view-collapse-app-user-view"
              aria-expanded="{{ Route::is('setting.struktur.kepala-sekolah.edit') ||
              Route::is('wakil-kepala-sekolah.index') ||
              Route::is('wakil-kepala-sekolah.create') ||
              Route::is('wakil-kepala-sekolah.edit')
                  ? 'true'
                  : 'false' }}">
              <span class="icon-[tabler--sitemap] size-4.5"></span>
              <span class="grow">Struktur Organisasi</span>
              <span
                class="icon-[tabler--chevron-right] accordion-item-active:rotate-90 size-4.5 shrink-0 transition-transform duration-300 rtl:rotate-180"></span>
            </button>
            <div id="view-collapse-app-user-view" role="region" aria-labelledby="app-user-view"
              @class([
                  'accordion-content mt-1 w-full overflow-hidden transition-[height] duration-300',
                  'hidden' => !(
                      Route::is('setting.struktur.kepala-sekolah.edit') ||
                      Route::is('wakil-kepala-sekolah.index') ||
                      Route::is('wakil-kepala-sekolah.create') ||
                      Route::is('wakil-kepala-sekolah.edit')
                  ),
              ])>
              <ul class="space-y-1">
                <li>
                  <a href="{{ route('setting.struktur.kepala-sekolah.edit') }}" @class([
                      'inline-flex w-full items-center px-2',
                      'menu-active' => Route::is('setting.struktur.kepala-sekolah.edit'),
                  ])>
                    <span class="icon-[tabler--briefcase] size-4.5"></span>
                    <span>Kepala Sekolah</span>
                  </a>
                </li>
                <li>
                  <a href="{{ route('wakil-kepala-sekolah.index') }}" @class([
                      'inline-flex w-full items-center px-2',
                      'menu-active' =>
                          Route::is('wakil-kepala-sekolah.index') ||
                          Route::is('wakil-kepala-sekolah.create') ||
                          Route::is('wakil-kepala-sekolah.edit'),
                  ])>
                    <span class="icon-[tabler--cat] size-4.5"></span>
                    <span>Wakil Kepala Sekolah</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a href="{{ route('setting.akun.edit') }}" @class([
                'inline-flex w-full items-center px-2',
                'menu-active' => Route::is('setting.akun.edit'),
            ])>
              <span class="icon-[tabler--user] size-4.5"></span>
              <span class="grow">Akun</span>
            </a>
          </li>
          <li
            class="text-base-content/50 before:bg-base-content/20 mt-2 p-2 text-xs uppercase before:absolute before:-start-3 before:top-1/2 before:h-0.5 before:w-2.5">
            Waspadalah
          </li>
          <li>
            <form class="block w-full" action="{{ route('logout') }}" method="POST">
              @csrf
              <button class="text-error flex w-full items-center justify-start gap-2" type="submit">
                <span class="icon-[tabler--logout] size-4.5"></span>
                <span>Logout</span>
              </button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>
</aside>
