@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-xl shadow-md p-8 space-y-6">
        <h2 class="text-2xl font-bold text-center text-gray-800">Log in</h2>
        
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" required autofocus
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-300" />
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-300" />
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="remember" class="rounded">
                    <span class="text-sm text-gray-600">Remember me</span>
                </label>
                <a href="#" class="text-sm text-gray-600 hover:underline">Forgot password?</a>
            </div>

            <button type="submit"
                class="w-full bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded cursor-pointer">
                Log in
            </button>
        </form>

        <p class="text-center text-sm text-gray-600">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Sign up</a>
        </p>
    </div>
</div>
@endsection
