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
  <div id="root">@yield('main')</div>

  @if (file_exists('dist/main.js'))
    <script src="{{asset('dist/main.js')}}"></script>
    <script src="{{asset('dist/runtime.js')}}"></script>
  @endif
</body>
</html>