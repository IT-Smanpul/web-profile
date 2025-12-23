@php
  $facilities = [
      [
          'image' => 'img/free-blog-1.png',
          'title' => 'Buffet Service',
          'description' =>
              'Navigate effortlessly with our intuitive design, optimized for all devices. Enjoy a seamless experience whether you\'re on a computer or mobile device.',
          'link' => '#',
      ],
      [
          'image' => 'img/free-blog-2.png',
          'title' => 'Food delivery',
          'description' =>
              'Enjoy a safe shopping experience with multiple payment options and SSL encryption. Your personal and financial information is always protected.',
          'link' => '#',
      ],
      [
          'image' => 'img/free-blog-3.png',
          'title' => 'Cafeteria',
          'description' =>
              'Find products quickly with advanced filters, sorting options, and suggestion. Save time and effortlessly locate exactly what you need with ease.',
          'link' => '#',
      ],
      [
          'image' => 'img/free-blog-1.png',
          'title' => 'Buffet Service',
          'description' =>
              'Navigate effortlessly with our intuitive design, optimized for all devices. Enjoy a seamless experience whether you\'re on a computer or mobile device.',
          'link' => '#',
      ],
      [
          'image' => 'img/free-blog-2.png',
          'title' => 'Food delivery',
          'description' =>
              'Enjoy a safe shopping experience with multiple payment options and SSL encryption. Your personal and financial information is always protected.',
          'link' => '#',
      ],
      [
          'image' => 'img/free-blog-3.png',
          'title' => 'Cafeteria',
          'description' =>
              'Find products quickly with advanced filters, sorting options, and suggestion. Save time and effortlessly locate exactly what you need with ease.',
          'link' => '#',
      ],
      [
          'image' => 'img/free-blog-1.png',
          'title' => 'Buffet Service',
          'description' =>
              'Navigate effortlessly with our intuitive design, optimized for all devices. Enjoy a seamless experience whether you\'re on a computer or mobile device.',
          'link' => '#',
      ],
      [
          'image' => 'img/free-blog-2.png',
          'title' => 'Food delivery',
          'description' =>
              'Enjoy a safe shopping experience with multiple payment options and SSL encryption. Your personal and financial information is always protected.',
          'link' => '#',
      ],
      [
          'image' => 'img/free-blog-3.png',
          'title' => 'Cafeteria',
          'description' =>
              'Find products quickly with advanced filters, sorting options, and suggestion. Save time and effortlessly locate exactly what you need with ease.',
          'link' => '#',
      ],
      [
          'image' => 'img/free-blog-1.png',
          'title' => 'Buffet Service',
          'description' =>
              'Navigate effortlessly with our intuitive design, optimized for all devices. Enjoy a seamless experience whether you\'re on a computer or mobile device.',
          'link' => '#',
      ],
      [
          'image' => 'img/free-blog-2.png',
          'title' => 'Food delivery',
          'description' =>
              'Enjoy a safe shopping experience with multiple payment options and SSL encryption. Your personal and financial information is always protected.',
          'link' => '#',
      ],
      [
          'image' => 'img/free-blog-3.png',
          'title' => 'Cafeteria',
          'description' =>
              'Find products quickly with advanced filters, sorting options, and suggestion. Save time and effortlessly locate exactly what you need with ease.',
          'link' => '#',
      ],
  ];
@endphp

<div class="bg-base-100 relative overflow-hidden py-12 sm:py-20 lg:py-28">
  <div class="bg-primary/15 pointer-events-none absolute -right-32 -top-32 h-[26rem] w-[26rem] rounded-full blur-3xl">
  </div>
  <div
    class="pointer-events-none absolute -bottom-32 -left-32 h-[30rem] w-[30rem] rounded-full bg-green-400/15 blur-3xl">
  </div>
  <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mb-14 space-y-6 text-center sm:mb-20 lg:mb-24">
      <div class="flex justify-center">
        <span class="rounded-full bg-green-500 px-4 py-1 text-sm font-medium text-white shadow">
          Fasilitas Sekolah
        </span>
      </div>
      <h2 class="text-base-content text-3xl font-bold md:text-4xl lg:text-5xl">
        Sarana & Prasarana Pendukung
      </h2>
      <p class="text-base-content/80 mx-auto max-w-3xl text-lg leading-relaxed md:text-xl">
        Berbagai fasilitas pendukung disediakan untuk menciptakan
        lingkungan belajar yang nyaman, aman, dan mendukung
        pengembangan potensi peserta didik secara optimal.
      </p>
    </div>
    <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
      @foreach ($facilities as $facility)
        <div
          class="bg-base-100 group relative overflow-hidden rounded-3xl shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
          <div class="absolute inset-0 opacity-0 transition group-hover:opacity-100">
            <div class="bg-primary/20 absolute -right-20 -top-20 h-40 w-40 rounded-full blur-2xl"></div>
          </div>
          <figure class="relative h-56 overflow-hidden">
            <img class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
              src="{{ asset($facility['image']) }}" alt="{{ $facility['title'] }}" />
          </figure>
          <div class="relative space-y-4 p-6">
            <h3 class="text-xl font-semibold">
              {{ $facility['title'] }}
            </h3>
            <p class="text-base-content/80 text-sm leading-relaxed">
              {{ $facility['description'] }}
            </p>
            <a class="text-primary inline-flex items-center gap-2 text-sm font-medium" href="{{ $facility['link'] }}">
              Lihat Detail
              <span class="icon-[tabler--arrow-right] size-4 rtl:rotate-180"></span>
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
