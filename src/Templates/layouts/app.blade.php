<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
</head>
<body>
  <div id="root">
    <header class="mb-5">
      @yield('navbar-top')
    </header>
    @yield('content')
    <footer>
      @yield('footer')
    </footer>
  </div>
  <script src="js/all.min.js"></script>
  <script src="js/style.min.js"></script>
  <script src="js/app.min.js"></script>
</body>
</html>