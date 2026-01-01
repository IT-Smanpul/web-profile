@extends('root')

@section('content')
  <main>
    <section class="bg-base-200 relative flex min-h-dvh items-center overflow-hidden">
      <!-- Background shapes -->
      <div class="bg-primary/20 pointer-events-none absolute -left-40 -top-40 h-96 w-96 rounded-full blur-3xl"></div>
      <div class="pointer-events-none absolute -bottom-40 -right-40 h-96 w-96 rounded-full bg-green-400/20 blur-3xl"></div>

      <div class="relative mx-auto w-full max-w-md px-4 sm:px-6 lg:px-8">

        <div class="bg-base-100/80 rounded-3xl border p-8 shadow-xl backdrop-blur">

          <!-- Header -->
          <div class="mb-8 text-center">
            <img class="mx-auto mb-4 h-14 w-14" src="{{ asset('img/logo.png') }}" alt="Logo Sekolah" />

            <h1 class="text-2xl font-bold">
              Login Sistem Sekolah
            </h1>
            <p class="text-base-content/70 mt-2 text-sm">
              Silakan masuk untuk mengakses sistem internal sekolah
            </p>
          </div>

          <!-- GLOBAL ERROR (username / password salah) -->
          @if (session('error'))
            <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
              {{ session('error') }}
            </div>
          @endif

          <!-- FORM -->
          <form class="space-y-6" method="POST" action="{{ url('/login') }}">
            @csrf

            <!-- Username -->
            <div>
              <label class="text-sm font-medium">
                Email
              </label>
              <input
                class="{{ $errors->has('email') ? 'border-red-500 focus:ring-red-500' : 'focus:ring-green-500' }} mt-2 w-full rounded-xl border px-4 py-3 text-sm focus:outline-none focus:ring-2"
                name="email" type="text" value="{{ old('email') }}" placeholder="Masukkan email" />

              @error('email')
                <p class="mt-1 text-xs text-red-600">
                  {{ $message }}
                </p>
              @enderror
            </div>

            <!-- Password -->
            <div>
              <label class="text-sm font-medium">
                Password
              </label>
              <input
                class="{{ $errors->has('password') ? 'border-red-500 focus:ring-red-500' : 'focus:ring-green-500' }} mt-2 w-full rounded-xl border px-4 py-3 text-sm focus:outline-none focus:ring-2"
                name="password" type="password" placeholder="Masukkan password" />

              @error('password')
                <p class="mt-1 text-xs text-red-600">
                  {{ $message }}
                </p>
              @enderror
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between text-sm">
              <label class="flex items-center gap-2">
                <input class="checkbox checkbox-sm" name="remember" type="checkbox" />
                Ingat saya
              </label>

              <a class="text-green-600 hover:underline" href="#">
                Lupa password?
              </a>
            </div>

            <!-- Submit -->
            <button class="btn btn-primary btn-gradient w-full" type="submit">
              Masuk
            </button>
          </form>

          <!-- Footer -->
          <p class="text-base-content/60 mt-8 text-center text-xs">
            © {{ now()->year }} SMA Negeri 10 Pontianak
            <br />
            Sistem Internal Sekolah
          </p>

        </div>

      </div>
    </section>
  </main>
@endsection
