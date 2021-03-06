<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GoIcook</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
        

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
 {{-- scripts > app --}}
        @stack('scripts') {{-- scripts > from views --}}
    </head>
<body>
    <div id="app">
	 <div class="app-admin-wrap layout-sidebar-large">
		<top-nav-component></top-nav-component>
        <left-sidebar-component></left-sidebar-component>
		
 <div class="main-content-wrap sidenav-open d-flex flex-column">       
            @yield('content')
   </div>     
		

   </div>
    </div>
</body>
</html>
