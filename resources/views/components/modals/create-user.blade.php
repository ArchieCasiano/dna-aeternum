<div x-data="{ open: false }">
    <button @click="open = true"
        class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition cursor-pointer">
        Add User
    </button>

    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-gray-600/50 z-50" x-cloak>
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 relative">
            <h2 class="text-xl font-bold mb-4">Create User</h2>

            <form method="POST" action="{{ route('users.store') }}" class="space-y-4">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm">First Name</label>
                        <input name="first_name" type="text" required class="w-full p-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm">Last Name</label>
                        <input name="last_name" type="text" required class="w-full p-2 border rounded" />
                    </div>
                </div>

                <div>
                    <label class="block text-sm">Email</label>
                    <input name="email" type="email" required class="w-full p-2 border rounded" />
                </div>

                <div>
                    <label class="block text-sm">Date of Birth</label>
                    <input name="date_of_birth" type="date" required class="w-full p-2 border rounded" />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm">Biological Sex</label>
                        <select name="biological_sex" class="w-full p-2 border rounded">
                            <option value="">Select</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Prefer not to answer</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm">Gender</label>
                        <select name="gender" class="w-full p-2 border rounded">
                            <option value="">Select</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Prefer not to answer</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm">Country</label>
                    <input name="country" type="text" class="w-full p-2 border rounded" />
                </div>

                <div>
                    <label class="block text-sm">Ethnicity</label>
                    <select name="ethnicity" class="w-full p-2 border rounded">
                        <option value="">Select</option>
                        <option>White</option>
                        <option>Hispanic and Latino</option>
                        <option>Black / African American</option>
                        <option>Asian</option>
                        <option>American Indian or Alaska Native</option>
                        <option>Native Hawaiian or Other Pacific Islander</option>
                        <option>Other</option>
                    </select>
                </div>

                <div class="flex items-center">
                    <input id="allow_trume_login" name="allow_trume_login" type="checkbox" class="mr-2">
                    <label for="allow_trume_login">Allow TruMe Login</label>
                </div>
                <div class="flex justify-end space-x-2 mt-4">
                    <button type="button" @click="open = false"
                        class="px-4 py-2 border rounded hover:bg-gray-100 cursor-pointer">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 cursor-pointer">Create</button>
                </div>
            </form>

            <button @click="open = false"
                class="absolute top-2 right-2 text-gray-500 hover:text-black text-xl cursor-pointer">
                &times;
            </button>
        </div>
    </div>
</div>
