{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>App</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">
    @yield('content')
</body>
</html>
