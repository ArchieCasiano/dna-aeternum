<div x-data="{ open: false }">
    <button @click="open = true"
        class="inline-flex items-center px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full hover:bg-yellow-200 transition cursor-pointer">
        <x-heroicon-o-pencil class="w-4 h-4 mr-1" />
        Edit
    </button>


    <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-gray-600/50 z-50" x-cloak>
        <div class="bg-white rounded-lg shadow-lg w-full max-w-2xl p-6 relative">
            <h2 class="text-xl font-bold mb-4">Edit User</h2>

            <form method="POST" action="{{ route('users.update', $user->id ?? 0) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm">First Name</label>
                        <input name="first_name" type="text" value="{{ $user->first_name }}" required
                            class="w-full p-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm">Last Name</label>
                        <input name="last_name" type="text" value="{{ $user->last_name }}" required
                            class="w-full p-2 border rounded" />
                    </div>
                </div>

                <div>
                    <label class="block text-sm">Email</label>
                    <input name="email" type="email" value="{{ $user->email }}" required
                        class="w-full p-2 border rounded" />
                </div>

                <div>
                    <label class="block text-sm">Date of Birth</label>
                    <input name="date_of_birth" type="date" value="{{ $user->date_of_birth }}" required
                        class="w-full p-2 border rounded" />
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm">Country</label>
                        <input name="country" type="text" value="{{ $user->country }}"
                            class="w-full p-2 border rounded" />
                    </div>
                    <div>
                        <label class="block text-sm">Gender</label>
                        <select name="gender" class="w-full p-2 border rounded">
                            <option {{ $user->gender === 'Male' ? 'selected' : '' }}>Male</option>
                            <option {{ $user->gender === 'Female' ? 'selected' : '' }}>Female</option>
                            <option {{ $user->gender === 'Prefer not to answer' ? 'selected' : '' }}>Prefer not to
                                answer</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm">Biological Sex</label>
                        <select name="biological_sex" class="w-full p-2 border rounded">
                            <option {{ $user->biological_sex === 'Male' ? 'selected' : '' }}>Male</option>
                            <option {{ $user->biological_sex === 'Female' ? 'selected' : '' }}>Female</option>
                            <option {{ $user->biological_sex === 'Prefer not to answer' ? 'selected' : '' }}>Prefer not
                                to answer</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm">Ethnicity</label>
                        <select name="ethnicity" class="w-full p-2 border rounded">
                            <option {{ $user->ethnicity === 'White' ? 'selected' : '' }}>White</option>
                            <option {{ $user->ethnicity === 'Hispanic and Latino' ? 'selected' : '' }}>Hispanic and
                                Latino</option>
                            <option {{ $user->ethnicity === 'Black / African American' ? 'selected' : '' }}>Black /
                                African American</option>
                            <option {{ $user->ethnicity === 'Asian' ? 'selected' : '' }}>Asian</option>
                            <option {{ $user->ethnicity === 'American Indian or Alaska Native' ? 'selected' : '' }}>
                                American Indian or Alaska Native</option>
                            <option
                                {{ $user->ethnicity === 'Native Hawaiian or Other Pacific Islander' ? 'selected' : '' }}>
                                Native Hawaiian or Other Pacific Islander</option>
                            <option {{ $user->ethnicity === 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                    </div>
                </div>

                <div class="flex items-center">
                    <input id="allow_trume_login_{{ $user->id }}" name="allow_trume_login" type="checkbox"
                        class="mr-2" {{ $user->allow_trume_login ? 'checked' : '' }}>
                    <label for="allow_trume_login_{{ $user->id }}">Allow TruMe Login</label>
                </div>

                <div class="flex justify-end space-x-2 mt-4">
                    <button type="button" @click="open = false"
                        class="px-4 py-2 border rounded hover:bg-gray-100 cursor-pointer">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 cursor-pointer">Update</button>
                </div>
            </form>

            <button @click="open = false"
                class="absolute top-2 right-2 text-gray-500 hover:text-black text-xl cursor-pointer">
                &times;
            </button>
        </div>
    </div>
</div>
