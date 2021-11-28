<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon" />
  @if (file_exists('dist/styles.css'))
    <link rel="stylesheet" href="dist/styles.css">
  @endif
</head>
<body class="antialised bg-gray-200">
  <div id="root">
    <div class="loading hidden">
      <img src="favicon.png" alt="">
    </div>
    <header class="fixed top-0 w-full">@yield('header')</header>
    <aside class="fixed top-0 w-3/4 h-screen bg-gray-900 z-40 overflow-y-scroll p-4 hidden sidebar">
      <div class="container flex flex-col gap-y-6">
        <div class="inline-flex flex-col gap-3">
          <h1 class="lg:text-3xl text-xl font-semibold text-white">Wadahkode</h1>
          <hr>
        </div>
  
        <ul class="text-white inline-flex flex-col gap-2">
          <li><a href="/">Beranda</a></li>
          <li><a href="tutorial">Tutorial</a></li>
          <li><a href="contact">Kontak kami</a></li>
          <li><a href="about">Tentang kami</a></li>
        </ul>
      </div>
    </aside>
    <div class="fixed top-0 bottom-0 z-30 bg-gray-800 w-full p-4 transition opacity-75 hidden sidebar-opacity"></div>
    <section>@yield('cover')</section>
    <main>@yield('main')</main>
  </div>

  @if (file_exists('dist/main.js'))
    <script async prefer src="dist/main.js" crossorigin="anonymous"></script>
    <script async prefer src="dist/runtime.js" crossorigin="anonymous"></script>
  @endif
  <script async prefer src="https://cdn.jsdelivr.net/npm/@wadahkode/memories@1.1.82/build/memories.min.js" crossorigin="anonymous"></script>
  <script>
    const btnMenu = document.getElementById("btn-menu");
    const sidebar = document.querySelector(".sidebar");
    const sidebarOpacity = document.querySelector(".sidebar-opacity");

    btnMenu.onclick = function(){
      if (sidebar.classList.contains("hidden") && sidebarOpacity.classList.contains("hidden")) {
        sidebar.classList.remove("hidden");
        sidebar.classList.add("transition");
        sidebar.classList.add("duration-700");
        sidebar.classList.add("ease-in-out");
        sidebarOpacity.classList.remove("hidden");
        sidebarOpacity.classList.add("transition");
        sidebarOpacity.classList.add("duration-700");
        sidebarOpacity.classList.add("ease-in-out");
      }
    }

    sidebarOpacity.onclick = function(){
      if (!sidebar.classList.contains("hidden") && !sidebarOpacity.classList.contains("hidden")) {
        sidebar.classList.add("hidden");
        sidebar.classList.add("transition");
        sidebar.classList.add("duration-700");
        sidebar.classList.add("ease-in-out");
        sidebarOpacity.classList.add("hidden");
        sidebarOpacity.classList.add("transition");
        sidebarOpacity.classList.add("duration-700");
        sidebarOpacity.classList.add("ease-in-out");
      }
    }
  </script>
</body>
</html>