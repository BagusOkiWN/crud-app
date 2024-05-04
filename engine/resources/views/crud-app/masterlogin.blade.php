<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @stack('aditional-css')
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        @include('crud-app.login')
        @include('crud-app.register')
    </div>    

    @stack('aditional-js')
</body>
</html>