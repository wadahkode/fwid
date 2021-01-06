<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon" />
</head>
<body>
  <div id="root">
    <header class="fixed-top">@yield('header')</header>
    <div class="cover container bg-dark pt-5 pb-4">@yield('cover')</div>
    <main class="container mt-3">@yield('main')</main>
  </div>
  <script src="js/all.min.js"></script>
  <script src="js/style.min.js"></script>
  <script src="js/app.min.js"></script>
</body>
</html>