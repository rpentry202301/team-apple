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
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="../js/jquery.mb.YTPlayer.min.js"></script>
</head>

<body>
    <div id="app">
        <x-header></x-header>
        <main class="py-4">
          @yield('content')
        </main>
        <x-footer></x-footer>
    </div>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="../static/js/bootstrap.min.js"></script> --}}
</body>

</html>

