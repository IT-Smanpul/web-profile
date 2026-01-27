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
          <li>
            <a class="hover:text-primary" href="{{ route('profil') }}">Profil Sekolah</a>
          </li>
          <li>
            <a class="hover:text-primary" href="{{ route('ekskul') }}">Ekstrakurikuler</a>
          </li>
          <li>
            <a class="hover:text-primary" href="{{ route('fasilitas') }}">Fasilitas</a>
          </li>
          <li>
            <a class="hover:text-primary" href="{{ route('prestasi') }}">Prestasi</a>
          </li>
          <li>
            <a class="hover:text-primary" href="{{ route('berita') }}">Berita</a>
          </li>
          <li>
            <a class="hover:text-primary" href="{{ route('kritik-saran-masukan') }}">Kritik Saran dan Masukan</a>
          </li>
        </ul>
      </div>
      <div class="">
        <h4 class="mb-4 text-sm font-semibold uppercase tracking-wide">
          Kontak
        </h4>
        <ul class="text-base-content/80 space-y-2 text-sm">
          <li>📍 Jl. Purnama Gg. Karya Tani, Parit Tokaya, Kec. Pontianak Sel., Kota Pontianak, Kalimantan Barat 78124
          </li>
          <li>📞 (0561) 747353</li>
          <li>✉️ sma10ptk@yahoo.co.id</li>
        </ul>
        <div class="mt-4 flex gap-4">
          <a href="https://www.facebook.com/people/Smanpul-Pontianak/pfbid02wDD6QUZYd4C8V8yYMai1tqHa3CWx6UKmTfLQSXHXnpNsvzR7FcCqsvjLAVRUafNbl/"
            aria-label="Facebook" target="_blank">
            <span class="icon-[tabler--brand-facebook] size-5"></span>
          </a>
          <a href="https://www.instagram.com/sman10ptk.official/" aria-label="Instagram" target="_blank">
            <span class="icon-[tabler--brand-instagram] size-5"></span>
          </a>
          <a href="https://www.tiktok.com/@sman10.pontianak" aria-label="TikTok" target="_blank">
            <span class="icon-[tabler--brand-tiktok] size-5"></span>
          </a>
          <a href="https://www.youtube.com/@smanegeri10pontianak35" aria-label="YouTube" target="_blank">
            <span class="icon-[tabler--brand-youtube] size-5"></span>
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
