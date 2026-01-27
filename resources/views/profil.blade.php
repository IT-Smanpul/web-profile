@extends('root')

@section('meta')
  <meta name="robots" content="index, follow" />
  <meta name="description"
    content="Profil lengkap SMA Negeri 10 Pontianak meliputi NPSN, status sekolah, akreditasi, kurikulum, visi dan misi, serta struktur kepemimpinan sekolah." />

  <meta property="og:type" content="website" />
  <meta property="og:title" content="Profil Sekolah | SMA Negeri 10 Pontianak" />
  <meta property="og:description"
    content="Kenali lebih dekat SMA Negeri 10 Pontianak melalui profil sekolah, visi misi, dan struktur organisasi." />
  <meta property="og:url" content="{{ url()->current() }}" />
  <meta property="og:image" content="{{ asset('img/og-profil-sekolah.jpg') }}" />
@endsection

@section('content')
  <x-ui.navbar />
  <main>
    <x-profil.intro />
    <x-profil.visi-misi />
    <x-profil.struktur />
    <x-profil.guru />
  </main>
  <x-ui.footer />
@endsection
