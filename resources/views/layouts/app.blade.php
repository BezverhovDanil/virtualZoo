<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Виртуальный зоопарк</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <link rel="shortcut icon" href="{{ asset('img/icon.png') }}" />



    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <header>
                <div class="container">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="#">
                        <img src="{{ asset('img/VirtualZooIcon.png') }}" alt="Логотип виртуального зоопарка">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarText">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}">Главная страница</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/pets/list') }}">Питомцы</a>
                                </li>
                                @auth
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/pets/add') }}">Добавить питомца</a>
                                    </li>
                                    
                                @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/login') }}">Войти</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/register') }}">Регистрация</a>
                                    </li>
                                @endauth
                                @auth
                                    <!-- Authentication Links -->
                                    
                                        <li class="nav-item dropdown">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                {{ Auth::user()->name }}
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Выйти') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>
                                        </li>
                                @endauth    
                                
                            </ul>
                        </div>

                    </nav>
                </div>
            </header>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        
   
    </div>
    @extends('layouts.footer')
</body>
</html>
