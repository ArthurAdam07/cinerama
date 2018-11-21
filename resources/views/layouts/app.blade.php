<!doctype html>
<html>
    <head>
        @include('include.head')
    </head>
    <body>
        
        @include('include.header')
        
        <br>
        <div class="container">
                @yield('content')
        </div>

        <footer class="page-footer font-small blue fixed-bottom">

        @include('include.footer')
        </footer> 
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @yield('javascript')
    </body>
</html>
