
<!doctype html>
<html>
@include('layouts.header')
<!-- page content -->
<body>
<div class="container">
    @include('navigation.default')
    @include('ErrorMessages')
    @if(Request::is('contact'))
        @include('showcase')
    @endif
    @yield('body')
</div>
</body>
@include('layouts.footer')
</html>