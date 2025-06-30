<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex">
    {{-- Sidebar --}}
    <aside class="w-64 bg-white h-screen shadow-md">
        <div class="p-6 font-bold text-xl text-blue-600">My App</div>
        <nav class="mt-6 space-y-2">
            <a href="{{ route('users') }}" class="block px-6 py-2 hover:bg-blue-50 {{ request()->routeIs('users') ? 'text-blue-600 font-semibold' : 'text-gray-700' }}">
                Users
            </a>
            <a href="{{ route('kits') }}" class="block px-6 py-2 hover:bg-blue-50 {{ request()->routeIs('kits') ? 'text-blue-600 font-semibold' : 'text-gray-700' }}">
                Kits
            </a>
            <a href="{{ route('settings') }}" class="block px-6 py-2 hover:bg-blue-50 {{ request()->routeIs('settings') ? 'text-blue-600 font-semibold' : 'text-gray-700' }}">
                Settings
            </a>
        </nav>
    </aside>

    {{-- Main content --}}
    <main class="flex-1 p-8">
        @yield('content')
    </main>
</body>
</html>
