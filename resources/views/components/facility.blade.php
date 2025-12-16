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

<div class="bg-base-100 py-8 sm:py-16 lg:py-24">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <div class="mb-12 space-y-4 text-center sm:mb-16 lg:mb-24">
      <h2 class="text-base-content text-2xl font-semibold md:text-3xl lg:text-4xl">
        Fasilitas Kami
      </h2>
      <p class="text-base-content/80 text-xl">
        From unforgettable flavors to seamless service, we’re here to make every meal feel special. Whether you dine in,
        take out, or order online we’ve got your cravings covered.
      </p>
    </div>
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
      @foreach ($facilities as $facility)
        <div class="card card-border shadow-none">
          <figure>
            <img src="{{ asset($facility['image']) }}" alt="{{ $facility['title'] }}" />
          </figure>
          <div class="card-body gap-3">
            <h5 class="card-title text-xl">{{ $facility['title'] }}</h5>
            <p class="mb-5">{{ $facility['description'] }}</p>
            <div class="card-actions">
              <a class="btn btn-primary btn-gradient" href="#">
                Read More
                <span class="icon-[tabler--arrow-right] size-5 rtl:rotate-180"></span>
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
