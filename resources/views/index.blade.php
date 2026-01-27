@extends('root')

@section('meta')
  <meta name="robots" content="index, follow" />
  <meta name="description"
    content="Website resmi SMA Negeri 10 Pontianak. Informasi profil sekolah, berita, prestasi dan kegiatan" />

  <meta property="og:title" content="SMA Negeri 10 Pontianak">
  <meta property="og:description" content="Website resmi SMA Negeri 10 Pontianak">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:image" content="{{ asset('img/logo.png') }}">
@endsection

@section('content')
  <x-ui.navbar />
  <main>
    <section id="beranda">
      <x-beranda.hero />
    </section>
    <section id="profil">
      <x-beranda.profil />
    </section>
    <section id="akademik">
      <x-beranda.akademik />
    </section>
    <section>
      <x-beranda.ekskul />
    </section>
    <section id="fasilitas">
      <x-beranda.fasilitas />
    </section>
    <section id="prestasi">
      <x-beranda.prestasi />
    </section>
    <section id="berita">
      <x-beranda.berita />
    </section>
  </main>
  <x-ui.footer />
  <button
    class="btn btn-circle btn-soft btn-secondary/20 bottom-15 end-15 motion-preset-slide-right motion-duration-800 motion-delay-100 z-3 fixed hidden"
    id="scrollToTopBtn" aria-label="Circle Soft Icon Button">
    <span class="icon-[tabler--chevron-up] size-5 shrink-0"></span>
  </button>
@endsection
