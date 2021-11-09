<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('img/icon.ico') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    @yield('content')
    @auth
    <div class="actions fixed bottom-0 right-0 m-4 p-0">
        <input type="checkbox"
            class="toggle appearance-none outline-none shadow-md border-none rounded-full bg-transparent cursor-pointer m-0 absolute z-10 transition-shadow duration-200 ease-in-out hover:shadow-2xl top-0 left-0 w-full h-full" />
        <a class="w-16 h-16 relative rounded-full bg-gray-900 text-white block" href="#" ><i
                class="far fa-question-circle fa-lg absolute top-2/4 left-1/2" ></i></a>
        <div class="buttons">
            @if(Auth::user()->role=='admin')
            <a class="button" href="{{route('seed')}}" title="{{ __('Refresh-database') }}"><i
                    class="fa fa-database absolute top-2/4 left-1/2 "></i></a>
            @endif
            <a class="button" href="{{route('logout')}}" title="{{ __('Logout') }}"><i
                    class="fa fa-sign-out-alt absolute top-2/4 left-1/2 "></i></a>
            @if(Route::currentRouteName() != 'choose')
            <a class="button" href="{{route('choose')}}" title="{{ __('Home') }}"><i
                    class="fa fa-home absolute top-2/4 left-1/2"></i></a>
            @endif
        </div>
        @endauth
    </div>
</body>

</html>
