<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link ref="stylesheet" href="{{ asset('css/reset.css') }}">
  <link ref="stylesheet" href="{{ asset('css/app.css') }}">
  <title>@yield('page_title')</title>
</head>
<body>
  <h1>@yield('headline')</h1>
  <div class="content">
    @yield('content')
  </div>
</body>
</html>