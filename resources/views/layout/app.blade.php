<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('images/e.png') }}" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" --}}
        {{-- crossorigin="anonymous"></script> --}}
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script> --}}
    {{-- <script src="https://kit.fontawesome.com/07948cac4f.js" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    {{-- ------------ --}}

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">
    @vite('resources/js/app.js')

    {{-- style --}}
    @stack('css')
    @push('css')
        <link rel="stylesheet" href="css/style.css">
    @endpush

</head>

<body class="antialiased">
    @include('layout.header')

    @yield('content')

    @include('layout.footer')
    <script src="./node_modules/preline/dist/preline.js"></script>
    @yield('scripts')



</body>

</html>
