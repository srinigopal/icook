<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <title>Elearning</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="cur-rte" content="{{ Route::currentRouteName() }}">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @if (Auth::check())
           <meta name="api-token" content="{{ Auth::user()->api_token }}">
        @endif

        <script src="{{ mix('/js/app.js') }}" defer></script> {{-- scripts > app --}}
        @stack('scripts') {{-- scripts > from views --}}

        <link href="{{ mix('/css/app.css') }}" rel="stylesheet"> {{-- styles > app --}}
        @stack('styles') {{-- styles > from views --}}

    </head>
    <body>

        <nav class="fixed-top">
            <div id="top-menu">
                <top-menu></top-menu>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>

    </body>

</html>