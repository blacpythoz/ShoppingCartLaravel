<!DOCTYPE html>
<html lang="en">
@include('partials.head')
<body>
    <div>
        @include ('partials.navbar')
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            @yield('content')
        </div>
    </div>
    @include('partials.footer')
</body>
</html>
