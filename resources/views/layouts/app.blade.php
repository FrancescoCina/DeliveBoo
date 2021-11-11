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
</head>
<body>
    <div class="d-flex" id="app">
        <div class="p-0 col-1">
            <nav class="bg-secondary" style="width: 100%; height: 100vh; ">
                <div class=" d-flex flex-column justify-content-between" style="height: 100vh;">
                    <div class="d-flex flex-column align-items-center ">
                        <img class="mt-3 mb-3 w-50 rounded-circle" src="{{ $restaurant->logo }}" alt="Logo">
                        <h4 class="text-center">{{ $restaurant->name }}</h4>
                    </div>


                    <div class="d-flex flex-column align-items-center">
                        <a class="text-white" href="{{ url('/') }}">
                            {{ __('Home') }}
                        <a class="text-white" href="{{ url('/admin') }}">
                            {{ __('Admin') }}
                        </a>
                        </a>
                        <a class="text-white" href="{{ url('/admin/plates') }}">
                            {{ __('Plates') }}
                        </a>
                        <a class="text-white" href="{{ url('/admin/orders') }}">
                            {{ __('Orders') }}
                        </a>
                    </div>
                    <button type="button" class="btn btn-primary m-2 mb-5">
                        <div class="d-flex flex-column align-items-center">
                            <a class="text-white" href="{{ route('logout') }} "onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                                @csrf
                            </form>
                        </div>
                    </button>
                </div> 
            </nav>
        </div>
        <div class="col-11">
            <main class="py-4" style="height: 100vh;">
                @yield('content')
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.js"></script>
    @yield('script')
</body>
</html>


