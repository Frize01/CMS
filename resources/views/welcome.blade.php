<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    <h1>Welcome to the CMS</h1>
    <p>Response Time: {{ round((microtime(true) - LARAVEL_START) * 1000, 2) }} ms</p>

    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit" class="btn btn-primary">Logout</button>
    </form>
</body>

</html>
