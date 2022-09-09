<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.head')
    <style>
        body {background-color: powderblue;}
        .pagination{
            margin-left:20%;
        }
    </style>
</head>
<body class="container">
    @include('partials.nav')
    @yield('content')

    @include('partials.footer')
    @include('partials.scripts')
</body>
</html>