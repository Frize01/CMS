<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Titre par défaut')</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])

</head>
<body class="flex flex-col min-h-screen">
    <header>
        {{-- @include('layouts.partials.navigation') --}}
    </header>

    <main class="flex-1">
        @yield('content')
    </main>

    <footer class="">
        {{-- @include('layouts.partials.footer') --}}
    </footer>
</body>
</html>
