<footer class="bg-base-100">
  <div class="mx-auto max-w-7xl px-4 py-12 sm:px-6 lg:px-8">
    <div class="grid gap-10 md:grid-cols-3">
      <div class="space-y-4">
        <a class="flex items-center gap-3 text-xl font-semibold" href="/">
          <img class="size-10" src="{{ asset('img/logo.png') }}" alt="Logo SMA Negeri 10 Pontianak">
          <span>SMA Negeri 10 Pontianak</span>
        </a>
        <p class="text-base-content/70 text-sm leading-relaxed">
          Sekolah menengah atas yang berkomitmen membentuk peserta didik
          berkarakter, berprestasi, dan siap menghadapi masa depan.
        </p>
      </div>
      <div>
        <h4 class="mb-4 text-sm font-semibold uppercase tracking-wide">
          Navigasi
        </h4>
        <ul class="text-base-content/80 space-y-2 text-sm">
          <li><a class="hover:text-primary" href="/profil">Profil Sekolah</a></li>
          <li><a class="hover:text-primary" href="/akademik">Akademik</a></li>
          <li><a class="hover:text-primary" href="/fasilitas">Fasilitas</a></li>
          <li><a class="hover:text-primary" href="/prestasi">Prestasi</a></li>
          <li><a class="hover:text-primary" href="/berita">Berita</a></li>
          <li>
            <a class="hover:text-primary" href="{{ route('kritik-saran-masukkan') }}">Kritik Saran dan Masukkan</a>
          </li>
        </ul>
      </div>
      <div class="">
        <h4 class="mb-4 text-sm font-semibold uppercase tracking-wide">
          Kontak
        </h4>
        <ul class="text-base-content/80 space-y-2 text-sm">
          <li>📍 Jl. Purnama Gang Karya Tani</li>
          <li>📞 089612345678</li>
          <li>✉️ alamak@smanpul.sch.id</li>
        </ul>
        <div class="mt-4 flex gap-4">
          <a href="#" aria-label="Instagram">
            <span class="icon-[tabler--brand-instagram] size-5"></span>
          </a>
          <a href="#" aria-label="TikTok">
            <span class="icon-[tabler--brand-tiktok] size-5"></span>
          </a>
          <a href="#" aria-label="YouTube">
            <span class="icon-[tabler--brand-youtube] size-5"></span>
          </a>
          <a href="#" aria-label="WhatsApp">
            <span class="icon-[tabler--brand-whatsapp] size-5"></span>
          </a>
        </div>
      </div>
    </div>
    <div class="divider my-10"></div>
    <div class="flex flex-col items-center justify-center gap-3 text-center text-sm md:flex-row md:text-left">
      <p class="text-base-content/70">
        © {{ now()->year }} SMA Negeri 10 Pontianak. All rights reserved.
      </p>
    </div>
  </div>
</footer>
