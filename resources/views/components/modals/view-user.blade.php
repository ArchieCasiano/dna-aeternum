<div x-data="{ open: false }">
    <button @click="open = true"
        class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-full hover:bg-blue-200 transition cursor-pointer">
        <x-heroicon-o-eye class="w-4 h-4 mr-1" />
        View
    </button>

    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-gray-600/50 z-50" x-cloak>
        <div class="bg-white rounded-lg shadow-lg w-full max-w-xl p-6 relative">
            <h2 class="text-xl font-bold mb-4">User Details</h2>

            <table class="w-full text-sm text-left text-gray-800 border border-gray-200 rounded-2xl">
                <tbody>
                    <tr class="border-b">
                        <th class="py-2 px-4 font-medium w-1/3">ID</th>
                        <td class="py-2 px-4">{{ $user->id }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-2 px-4 font-medium w-1/3">Name</th>
                        <td class="py-2 px-4">{{ $user->first_name }} {{ $user->last_name }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-2 px-4 font-medium">Email</th>
                        <td class="py-2 px-4">{{ $user->email }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-2 px-4 font-medium">Date of Birth</th>
                        <td class="py-2 px-4">{{ $user->date_of_birth }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-2 px-4 font-medium">Gender</th>
                        <td class="py-2 px-4">{{ $user->gender ?? 'N/A' }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-2 px-4 font-medium">Biological Sex</th>
                        <td class="py-2 px-4">{{ $user->biological_sex ?? 'N/A' }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-2 px-4 font-medium">Country</th>
                        <td class="py-2 px-4">{{ $user->country ?? 'N/A' }}</td>
                    </tr>
                    <tr class="border-b">
                        <th class="py-2 px-4 font-medium">Ethnicity</th>
                        <td class="py-2 px-4">{{ $user->ethnicity ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th class="py-2 px-4 font-medium">Allow TruMe Login</th>
                        <td class="py-2 px-4">{{ $user->allow_trume_login ? 'Yes' : 'No' }}</td>
                    </tr>
                </tbody>
            </table>

            <div class="flex justify-end mt-6">
                <button @click="open = false"
                    class="px-4 py-2 border rounded-3xl hover:bg-gray-100 cursor-pointer">Close</button>
            </div>

            <button @click="open = false"
                class="absolute top-2 right-4 text-gray-500 hover:text-black text-xl cursor-pointer">
                &times;
            </button>
        </div>
    </div>
</div>
