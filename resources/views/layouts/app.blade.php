<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex">
    <aside class="w-64 bg-white h-screen shadow-md flex flex-col">
        <div class="p-6 font-bold text-xl text-blue-600">My App</div>

        <div class="flex-1 flex flex-col justify-between">
            <nav class="space-y-2 px-4">
                <a href="{{ route('dashboard') }}"
                class="block px-6 py-2 rounded-lg {{ request()->routeIs('dashboard') ? 'bg-gray-300 text-gray-600 font-semibold' : 'text-gray-700 hover:bg-blue-50' }}">
                    Dashboard
                </a>
                <a href="{{ route('users') }}"
                class="block px-6 py-2 rounded-lg {{ request()->routeIs('users') ? 'bg-gray-300 text-gray-600 font-semibold' : 'text-gray-700 hover:bg-blue-50' }}">
                    Users
                </a>
                <a href="{{ route('kits') }}"
                class="block px-6 py-2 rounded-lg {{ request()->routeIs('kits') ? 'bg-gray-300 text-gray-600 font-semibold' : 'text-gray-700 hover:bg-blue-50' }}">
                    Kits
                </a>
            </nav>

            <div class="px-4 pb-4">
                <a href="{{ route('settings') }}"
                class="block px-6 py-2 rounded-lg {{ request()->routeIs('settings') ? 'bg-gray-300 text-gray-600 font-semibold' : 'text-gray-700 hover:bg-blue-50' }}">
                    Settings
                </a>
            </div>
        </div>
    </aside>


    {{-- Main content --}}
    <main class="flex-1 p-8">
        @yield('content')
    </main>
</body>
</html>
