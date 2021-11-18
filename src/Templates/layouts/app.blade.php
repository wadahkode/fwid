<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon" />
  <link rel="stylesheet" href="css/wadahkode.css">
</head>
<body>
  <div id="root">
    <header class="fixed top-0 w-full">@yield('header')</header>
    <div class="h-screen">@yield('cover')</div>
    <main class="container mt-3">@yield('main')</main>
  </div>
</body>
</html>