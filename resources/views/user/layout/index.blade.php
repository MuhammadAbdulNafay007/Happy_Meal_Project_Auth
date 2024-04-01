<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Happy Meal Home Page')</title>
    @include('user.includes.style')

</head>
<body>
    @include('user.includes.header')
    @yield('content')
    @include('user.includes.script')
</body>
</html>