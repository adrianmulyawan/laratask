<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/styles/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/styles/data-aos.css') }}">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
    @stack('addon-style')
</head>

<body>
    <div class="row justify-content-center">
        <div class="col-8">
            @include('components.navbar-component')
        </div>
        <div class="col-8">
            @yield('content')
        </div>
    </div>


    <script src="{{ asset('frontend/scripts/data-aos.js') }}"></script>
    <script>
        AOS.init();
    </script>
    @stack('addon-script')
</body>

</html>
