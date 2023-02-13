<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <head>
   @include('Admin.partials.head')
 </head>
 <body>
    <div id="app">          
        @include('Admin.partials.nav')

        @include('Admin.partials.header')

        <main class="py-4">
            @yield('content')
        </main>
        
        @include('Admin.partials.footer')        
    </div>
    @include('Admin.partials.footer-scripts')  
 </body>
</html>    