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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://kit.fontawesome.com/0722d56e11.js" crossorigin="anonymous"></script>
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
