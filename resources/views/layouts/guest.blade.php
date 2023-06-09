<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="/assets/images/favicon.png" />

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @livewireStyles
    @stack('css')
</head>

<body class="bg-light font-sans antialiased">
    {{ $slot }}

    @livewireScripts
    @stack('scripts')
</body>

</html>
