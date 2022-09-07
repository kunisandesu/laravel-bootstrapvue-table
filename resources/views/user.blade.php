<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style type="text/css">

    p {
    width: 150px;
    background-color: #2F4F4F;
    }
    
    p.example1 { padding: 10px 0 0 10px; }
    p.example2 { padding: 10px 0 10px 10px; }
    p.example3 { padding: 10px 0 10px 10px; }
    p.example4 { padding: 10px 0 10px 10px; }
    p.example5 { padding: 10px 0 10px 10px; }

    </style>
</head>
<body>
  <div id="app">

  <p class="example1">
  <font size="5" color="white">
  参加者一覧
  </font>
  </p>

  <p class="example2">
  <font size="3" color="white">
  予選
  </font>
  </p>
    <user-component></user-component>

  <p class="example3">
  <font size="3" color="white">
  使わない
  </font>
  </p>
    <user-component></user-component>

  <p class="example4">
  <font size="3" color="white">
  使わない
  </font>
  </p>
    <user-component></user-component>

  <p class="example4">
  <font size="3" color="white">
  使わない
  </font>
  </p>
    <user-component></user-component>

  </div>
</body>
</html>


