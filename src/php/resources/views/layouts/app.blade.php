<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') | {{ config('app.name', 'Pizapple') }}</title>
    <link href="../css/bootstrap.css" rel="stylesheet" />
    <link href="../css/piza.css" rel="stylesheet" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://kit.fontawesome.com/0722d56e11.js" crossorigin="anonymous"></script>
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

