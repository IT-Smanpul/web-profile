<!doctype html>
<html class="scroll-smooth" data-theme="light" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="robots" content="noindex, nofollow" />
    <title>SMA Negeri 10 Pontianak</title>

    <meta name="description"
      content=" FlyonUIPro is the best FlyonUI dashboard for responsive web apps. Streamline your app development process with ease." />
    <link type="image/x-icon" href="{{ asset('img/favicon/favicon.ico') }}" rel="icon" />

    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&ampdisplay=swap"
      rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
    <header class="border-base-content/20 bg-base-100 fixed top-0 z-10 w-full border-b py-px">
      <nav class="navbar mx-auto max-w-7xl rounded-b-xl px-4 sm:px-6 lg:px-8">
        <div class="w-full justify-between lg:flex lg:items-center lg:gap-2">
          <div class="navbar-start items-center justify-between max-lg:w-full">
            <a class="text-base-content flex items-center gap-3 text-xl font-semibold" href="/">
              <img class="size-12" src="{{ asset('img/logo.png') }}" alt="Logo Sekolah">
              <span>SMA Negeri 10 Pontianak</span>
            </a>
            <div class="flex items-center gap-3 lg:hidden">
              <a class="btn btn-primary btn-sm" href="/">SIMPUL</a>
              <a class="btn btn-primary btn-sm" href="/">Login</a>
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
              <a class="hover:text-primary nav-link" href="#beranda">Beranda</a>
              <a class="hover:text-primary nav-link" href="#profil">Profil Sekolah</a>
              <a class="hover:text-primary nav-link" href="#akademik">Akademik</a>
              <a class="hover:text-primary nav-link" href="#fasilitas">Fasilitas</a>
              <a class="hover:text-primary nav-link" href="#prestasi">Prestasi</a>
              <a class="hover:text-primary nav-link" href="#berita">Berita</a>
            </div>
          </div>
          <div class="navbar-end gap-3 max-lg:hidden">
            <a class="btn btn-primary" href="/">SIMPUL</a>
            <a class="btn btn-primary" href="/">LOGIN</a>
          </div>
        </div>
      </nav>
    </header>
    <main>
      <section id="beranda">
        <x-hero />
      </section>
      <section id="profil">
        <x-about />
      </section>
      {{--      <!-- Blog Component --> --}}
      {{--      <section id="services"> --}}
      {{--        <x-facility /> --}}
      {{--      </section> --}}
      {{--      <!-- Customer Reviews --> --}}
      {{--      <section id="test"> --}}
      {{--        <x-testimonial /> --}}
      {{--      </section> --}}
      {{--      <!-- CTA Section --> --}}
      {{--      <div class="bg-base-100 py-8 sm:py-16 lg:py-24"> --}}
      {{--        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8"> --}}
      {{--          <div class="from-primary/30 to-error/30 bg-linear-to-r overflow-hidden rounded-3xl p-px"> --}}
      {{--            <div class="bg-base-100 rounded-3xl p-0.5"> --}}
      {{--              <div class="from-primary/6 to-error/6 bg-linear-to-r relative rounded-3xl to-50% p-8 lg:p-16"> --}}
      {{--                <div --}}
      {{--                  class="flex justify-between gap-8 max-md:flex-col max-sm:items-center max-sm:text-center md:items-center"> --}}
      {{--                  <div class="max-w-xs space-y-4 lg:max-w-lg"> --}}
      {{--                    <h2 class="text-base-content text-xl font-bold md:text-3xl">Order Now & Satisfy Your Cravings --}}
      {{--                    </h2> --}}
      {{--                    <p class="text-base-content/80">Let us bring the flavors you love straight to your door. From --}}
      {{--                      classic comfort dishes to chef-curated specials, every bite is made with care and delivered --}}
      {{--                      fresh. Skip the wait — your next favorite meal is just a click away.</p> --}}
      {{--                    <a class="btn btn-gradient btn-primary" href="#"> --}}
      {{--                      Read More --}}
      {{--                      <span class="icon-[tabler--arrow-right]"></span> --}}
      {{--                    </a> --}}
      {{--                  </div> --}}
      {{--                  <img --}}
      {{--                    class="intersect-once intersect:motion-preset-slide-down-lg intersect:motion-duration-800 intersect:motion-opacity-in-0 intersect:motion-delay-100 absolute end-[21%] top-0 h-20 max-w-sm max-md:hidden" --}}
      {{--                    src="{{ asset('img/mint.png') }}" alt="mint" /> --}}
      {{--                  <img class="rtl:rotate-y-180 absolute end-0 top-0 h-full max-w-md rounded-br-3xl max-md:hidden" --}}
      {{--                    src="{{ asset('img/pizza.png') }}" alt="Pizza" /> --}}
      {{--                </div> --}}
      {{--              </div> --}}
      {{--            </div> --}}
      {{--          </div> --}}
      {{--        </div> --}}
      {{--      </div> --}}
      {{--      <div class="via-primary/20 bg-linear-to-r mx-auto h-px w-3/5 from-transparent to-transparent"></div> --}}
      {{--      <!-- Team --> --}}
      {{--      <section id="team"> --}}
      {{--        <x-team /> --}}
      {{--      </section> --}}
      {{--      <!-- FAQ --> --}}
      {{--      <section id="faqs"> --}}
      {{--        <x-article /> --}}
      {{--      </section> --}}
    </main>
    {{--    <footer> --}}
    {{--      <div class="mx-auto max-w-7xl px-4 py-4 sm:px-6 sm:py-6 lg:px-8 lg:py-8"> --}}
    {{--        <div class="flex items-center justify-between gap-3 max-md:flex-col"> --}}
    {{--          <a class="text-base-content flex items-center gap-3 text-xl font-semibold" href="/"> --}}
    {{--            <img class="size-10" src="{{ asset('img/logo.png') }}" alt="Logo Sekolah"> --}}
    {{--            <span>SMA Negeri 10 Pontianak</span> --}}
    {{--          </a> --}}
    {{--          <div class="text-base-content flex h-5 gap-4"> --}}
    {{--            <a href="https://discord.com/invite/kBHkY7DekX" aria-label="Discord" target="_blank" --}}
    {{--               rel="noopener noreferrer"> --}}
    {{--              <span class="icon-[tabler--brand-discord] size-5"></span> --}}
    {{--            </a> --}}
    {{--            <a href="https://x.com/flyonui" aria-label="Twitter" target="_blank" rel="noopener noreferrer"> --}}
    {{--              <span class="icon-[tabler--brand-x] size-5"></span> --}}
    {{--            </a> --}}
    {{--            <a href="https://github.com/themeselection/flyonui" aria-label="Github" target="_blank" --}}
    {{--               rel="noopener noreferrer"> --}}
    {{--              <span class="icon-[tabler--brand-github] size-5"></span> --}}
    {{--            </a> --}}
    {{--          </div> --}}
    {{--        </div> --}}
    {{--      </div> --}}
    {{--      <div class="divider"></div> --}}
    {{--      <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8"> --}}
    {{--        <div class="text-base-content text-center text-base"> --}}
    {{--          &copy; {{ now()->year }} <a class="text-primary" href="/">TIM IT SMANPUL</a> --}}
    {{--          <br class="md:hidden" /> Made With ❤️ for better web. --}}
    {{--        </div> --}}
    {{--      </div> --}}
    {{--    </footer> --}}
    {{--    <button --}}
    {{--      class="btn btn-circle btn-soft btn-secondary/20 bottom-15 end-15 motion-preset-slide-right motion-duration-800 motion-delay-100 z-3 fixed hidden" --}}
    {{--      id="scrollToTopBtn" aria-label="Circle Soft Icon Button"> --}}
    {{--      <span class="icon-[tabler--chevron-up] size-5 shrink-0"></span> --}}
    {{--    </button> --}}
  </body>
</html>
