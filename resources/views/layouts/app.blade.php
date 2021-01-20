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
    <script src="{{ asset('js/custom.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-light bg-faded navbar-static-top dash-navbar-top nb-visible">
        <button class="nb-btn-toggle">
            <span class="fa fa-bars"></span>
        </button>
    </nav>
    <div class="dash-navbar-left nb-visible">
        <a class="navbar-brand" href="#">Food admin panel</a>
        <ul class="nb-nav">
            <li>
                <a class="collapsed" data-toggle="collapse" href="#excercise" aria-expanded="false" aria-controls="excercise">
                    <span class="fa fa-child nb-link-icon"></span>
                    <span class="nb-link-text">Manage Excercises</span>
                    <span class="fa fa-angle-up nb-btn-sub-collapse"></span>
                </a>
                <ul class="nb-sub-one collapse" id="excercise">
                    <li>
                      <a href="{{route('fooditem')}}">
                        <span class="fa fa-slack nb-link-icon"></span>
                        <span class="nb-link-text">All food item</span>
                      </a>
                    </li>
                     <li>
                      <a href="{{route('add-fooditem')}}">
                        <span class="fa fa-slack nb-link-icon"></span>
                        <span class="nb-link-text">Add Food item</span>
                      </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div> <!-- /.dash-navbar-left -->


    <div class="content-wrap nb-visible" data-effect="nb-push">
      <div class="container-fluid">
        <div class="row">
            @yield('content')
         <!-- End of your content -->
        </div>
      </div>
    </div> <!-- /.content-wrap --></body>
</html>