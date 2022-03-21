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
    <link href="/css/layout.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <div class="row">
                <div class="col-sm-12 col-md-1 p-0">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="text-center">年</h6>
                        </div>
                        <div class="card-body my-card-body">
                            @foreach ($years as $data)
                               <a href="/?year={{ $data->year }}" class="card-text d-block text-center"> {{ $data->year }}年</a>
                            @endforeach

                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-1 p-0">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="text-center">月</h6>
                        </div>
                        <div class="card-body my-card-body">
                            {{-- <a href="/?time_id=0" class="card-text d-block text-center">年間合計</a> --}}
                            @foreach ($months as $data)
                               <a  href="/?time_id={{ $data->id }}" class="card-text d-block text-center"> {{ $data->month }}月</a>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-10 p-0">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                                <h6>{{ $selectData['time']->year }}年{{ $selectData['time']->month }}月</h6>
                                <a href="/edit?time_id={{$selectData['time']->id}}">追加</a>
                        </div>
                        @yield('content')
                    </div>
                </div>
        </main>
    </div>
</body>
</html>
