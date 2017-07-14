<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('partials.head')
<body>
    <div>
        @include ('partials.navbar')
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            @yield('content')
        </div>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
