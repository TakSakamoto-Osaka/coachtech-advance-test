<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
  <link href="{{ asset('css/common.css') }}" rel="stylesheet">
  @yield('pageCSS')
  <title>COACHTECH Advanceテスト</title>
</head>
<body>
  @yield('headline')
  <div class="content">
    @yield('content')
  </div>
</body>
</html>