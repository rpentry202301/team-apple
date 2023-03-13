<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title') | {{ config('app.name', 'Pizapple') }}</title>
  <link href="../css/bootstrap.css" rel="stylesheet" />
  <link href="../css/piza.css" rel="stylesheet" />
  <link href="../css/header.css" rel="stylesheet">
  <link href="../css/footer.css" rel="stylesheet">
  <link href="../css/app.css" rel="stylesheet">
  <link href="../css/common.css" rel="stylesheet">
  <link href="../css/item_list.css" rel="stylesheet">
  <link href="../css/item_detail.css" rel="stylesheet">
  <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=League+Gothic&family=Rajdhani:wght@700&family=Secular+One&display=swap" rel="stylesheet">  -->
  <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=League+Gothic&family=Rajdhani:wght@700&family=Secular+One&display=swap" rel="stylesheet"> -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=League+Gothic&family=Rajdhani:wght@700&family=Secular+One&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/earlyaccess/nicomoji.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<script src="{{ asset('js/app.js') }}"></script>

  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="../js/jquery.mb.YTPlayer.min.js"></script>
</head>

<body>
<div id="wrap">
    <div id="app">
      <x-header></x-header>
      <main class="py-4">
        @yield('content')
      </main>
    </div>
  </div>
  <x-footer></x-footer>
</body>
</html>
