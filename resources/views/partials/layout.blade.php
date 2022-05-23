<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($title) ? $title : 'No Title' }}</title>
    @yield('head')
</head>
<body>
@yield('body')
@yield('scripts')
@yield('styles')
</body>
</html>

