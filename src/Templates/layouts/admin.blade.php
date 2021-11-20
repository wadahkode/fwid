<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="shortcut icon" href="../favicon.png" type="image/x-icon" />
  <link rel="stylesheet" href="../dist/styles.css">
</head>
<body class="antialised bg-gray-200">
  <div id="root">
    <header class="fixed top-0 w-full">@yield('header')</header>
    <section>@yield('cover')</section>
    <main>@yield('main')</main>
  </div>

  <script src="../dist/main.js"></script>
  <script src="../dist/runtime.js"></script>
</body>
</html>