@extends('layouts.guest')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-xl bg-white rounded-xl shadow-md p-8 space-y-6">
        <h2 class="text-2xl font-bold text-center text-gray-800">Sign Up</h2>

        <form method="POST" action="#" class="space-y-4">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input id="first_name" name="first_name" type="text" required
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-300" />
                </div>

                <div>
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input id="last_name" name="last_name" type="text" required
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-300" />
                </div>
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-300" />
            </div>

            <div>
                <label for="date_of_birth" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                <input id="date_of_birth" name="date_of_birth" type="date" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-300" />
            </div>

            <div class="flex items-center space-x-2">
                <input id="allow_trume_login" name="allow_trume_login" type="checkbox"
                    class="rounded text-blue-600">
                <label for="allow_trume_login" class="text-sm text-gray-700">Allow TruMe login</label>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="biological_sex" class="block text-sm font-medium text-gray-700">Biological Sex</label>
                    <select id="biological_sex" name="biological_sex"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-300">
                        <option value="" selected disabled>Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Prefer not to answer">Prefer not to answer</option>
                    </select>
                </div>

                <div>
                    <label for="gender" class="block text-sm font-medium text-gray-700">Gender</label>
                    <select id="gender" name="gender"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-300">
                        <option value="" selected disabled>Choose...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Prefer not to answer">Prefer not to answer</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                <input id="country" name="country" type="text"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-300" placeholder="e.g. United States of America" />
            </div>

            <div>
                <label for="ethnicity" class="block text-sm font-medium text-gray-700">Ethnicity</label>
                <select id="ethnicity" name="ethnicity"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-300">
                    <option value="" selected disabled>Choose...</option>
                    <option value="White">White</option>
                    <option value="Hispanic and Latino">Hispanic and Latino</option>
                    <option value="Black / African American">Black / African American</option>
                    <option value="Asian">Asian</option>
                    <option value="American Indian or Alaska Native">American Indian or Alaska Native</option>
                    <option value="Native Hawaiian or Other Pacific Islander">Native Hawaiian or Other Pacific Islander</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-300" />
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-300" />
                </div>
            </div>

            <button type="submit"
                class="w-full bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Create Account
            </button>
        </form>

        <p class="text-center text-sm text-gray-600">
            Already have an account?
            <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Log in</a>
        </p>
    </div>
</div>
@endsection
