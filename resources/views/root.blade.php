<!doctype html>
<html class="scroll-smooth" data-theme="corporate" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <meta name="robots" content="noindex, nofollow" />
    <title>{{ $title ?? Config::get('app.name') }}</title>

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
    @yield('content')
  </body>
</html>
