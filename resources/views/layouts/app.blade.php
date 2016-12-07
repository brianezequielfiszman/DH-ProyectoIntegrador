<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Manija') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/master.css" rel="stylesheet">


    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="/js/typeahead.min.js"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div id="app">
        @include('layouts.main-nav')
        <div class="container">
          <div class="row">
              <nav class="visible-lg visible-md visible-sm hidden-xs col-lg-2 col-md-2 col-sm-2 col-sm-offset-0 col-md-offset-0 col-lg-offset-0">
                  @include('layouts.horizontal-navbar')
              </nav>
            @yield('content')
          </div>
        </div>
    </div>
</body>
</html>
