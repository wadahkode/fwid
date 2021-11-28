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
  <div id="root">
    <header class="relative py-8">
      @yield('header')
    </header>

    <div class="grid grid-cols-10">
      <div class="col-span-2 relative">
        @yield('sidebar')
      </div>
      <div class="col-span-8">
        @yield('main')
      </div>
    </div>
  </div>

  {{-- <div id="root" class="grid grid-rows-3 gap-3"> --}}
    {{-- <div class="col-start-2">
      <aside class="fixed top-14 left-0 bottom-0 lg:w-1/5 md:w-1/4 w-3/4 h-screen bg-white lg:overflow-auto md:overflow-auto overflow-y-scroll sidebar shadow-lg hidden lg:inline md:inline">
        @yield('sidebar')
      </aside>
      <div class="fixed top-0 bottom-0 z-30 bg-gray-800 w-full p-4 transition opacity-75 hidden sidebar-opacity"></div>
    </div>
    <div class="bg-red-900 col-start-1 col-span-2">
      @yield('header')
    </div>
    <div class="bg-blue-900 col-start-1 col-end-3">
      <main id="main">@yield('main')</main>
    </div> --}}
    {{-- <header class="z-50 row-span-3">@yield('header')</header>

    <div class="col-span-2">
      <aside class="!fixed top-14 left-0 !lg:w-1/5 !md:w-1/4 !w-3/4 !h-screen bg-white lg:overflow-auto md:overflow-auto overflow-y-scroll sidebar shadow-lg hidden lg:inline md:inline">
        @yield('sidebar')
      </aside>
      <div class="fixed top-0 bottom-0 z-30 bg-gray-800 w-full p-4 transition opacity-75 hidden sidebar-opacity"></div>
    </div>

    <main id="main" class="row-span-2 col-span-2">@yield('main')</main> --}}
  {{-- </div> --}}

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