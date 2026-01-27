@extends('root')

@section('content')
  <x-ui.navbar />
  <main>
    <section class="bg-base-200 relative overflow-hidden py-28 pb-20">
      <div class="bg-primary/20 pointer-events-none absolute -left-40 -top-40 h-96 w-96 rounded-full blur-3xl"></div>
      <div class="pointer-events-none absolute -bottom-40 -right-40 h-96 w-96 rounded-full bg-green-400/20 blur-3xl"></div>
      <div class="relative mx-auto max-w-4xl px-4 text-center">
        <span class="inline-block rounded-full bg-green-500 px-4 py-1 text-sm font-medium text-white shadow">
          Kritik & Saran
        </span>
        <h1 class="mt-6 text-3xl font-bold md:text-4xl">
          Kotak Saran Sekolah
        </h1>
        <p class="text-base-content/80 mx-auto mt-5 max-w-2xl text-lg leading-relaxed">
          Kami terbuka terhadap kritik, saran, dan masukan demi meningkatkan kualitas
          pendidikan serta pelayanan di SMA Negeri 10 Pontianak.
        </p>
      </div>
    </section>
    <section class="bg-base-100 py-16">
      <div class="mx-auto max-w-3xl px-4">
        <div class="bg-base-100 rounded-2xl border p-8 shadow-sm">
          <livewire:kritik-saran-masukan />
        </div>
      </div>
    </section>
  </main>
  <x-ui.footer />
@endsection
