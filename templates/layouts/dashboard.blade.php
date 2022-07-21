<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="shortcut icon" href="{{asset('favicon.png')}}" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  @if (file_exists('dist/styles.css'))
    <link rel="stylesheet" href="{{asset('/dist/styles.css')}}">
  @endif
</head>
<body class="antialised bg-gray-200" style="font-family: 'Lato', sans-serif;">
  <div id="root" class="overflow-auto pb-12">
    <header class="relative py-8">
      @yield('header')
    </header>

    <div class="grid lg:grid-cols-10 grid-cols-1">
      <div id="sidebar" class="lg:col-span-2 relative hidden lg:block md:block">
        @yield('sidebar')
      </div>
      <div class="lg:col-span-8">
        @yield('main')
      </div>
    </div>
  </div>
  
  @if (file_exists('dist/main.js'))
    <script src="{{asset('/dist/main.js')}}"></script>
    <script src="{{asset('/dist/runtime.js')}}"></script>
  @endif
  <script async prefer src="https://cdn.jsdelivr.net/npm/@wadahkode/memories@1.1.82/build/memories.min.js" crossorigin="anonymous"></script>
  <script src="{{asset('/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('/vendor/ckeditor/ckeditor.js')}}"></script>
  {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
  <script src="{{asset('/js/dashboard.js')}}"></script>
</body>
</html>