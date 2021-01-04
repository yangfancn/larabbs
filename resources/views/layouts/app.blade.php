<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- CSRF TOKEN -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'LaraBBS')-{{ env('APP_NAME') }}</title>
  <!-- Styles -->
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  @yield('style')
</head>
<body>
  <div id="app" class="{{ route_class() }}-page">
    @include('layouts._header')
    <div class="container mb-5">
      @include('shared._messages')
      @yield('content')
    </div>
    @include('layouts._footer')
  </div>
  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}"></script>
  @yield('script')
</body>
</html>
