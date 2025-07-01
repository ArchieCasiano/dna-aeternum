@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Users</h1>
        @include('components.modals.create-user')
    </div>

    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">ID</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Country</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Gender</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 text-sm text-gray-700">
                <tr>
                    <td class="px-6 py-4">12345</td>
                    <td class="px-6 py-4">Jane Doe</td>
                    <td class="px-6 py-4">jane@example.com</td>
                    <td class="px-6 py-4">United States</td>
                    <td class="px-6 py-4">Female</td>
                    <td class="px-6 py-4 space-x-2">
                        <a href="#" class="text-blue-600 hover:underline">View</a>
                        <a href="#" class="text-yellow-600 hover:underline">Edit</a>
                    </td>
                </tr>
                {{-- More rows dynamically later --}}
            </tbody>
        </table>
    </div>
@endsection
