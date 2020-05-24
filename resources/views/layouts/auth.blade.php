<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

     

    <!-- Styles -->
    <link href="{{ asset('css/web.css') }}" rel="stylesheet">
       <!-- Scripts -->
    <script src="{{ asset('js/web.js') }}" defer></script>

    </head>
<body>
    <div id="app">
	 <div class="app-admin-wrap layout-sidebar-large">
  <top-nav-component></top-nav-component>
        

        <main class="py-4">
            @yield('content')
        </main>
		
		
   </div>
    </div>
</body>
</html>
