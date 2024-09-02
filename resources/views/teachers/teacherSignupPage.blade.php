@extends('layouts.master')

@section('content')

<div class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900">
    <div class="w-full max-w-4xl p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
        <form class="space-y-6" action="{{ route('createTeacher') }}" method="POST">
            <div class="logo">
                <img src="{{ asset('/images/notebook.png') }}" alt="Logo" class="w-8 h-8">
            </div>
            <h5 class="text-xl font-medium text-gray-900 dark:text-white">Add Teacher</h5>
            @csrf
            @if(\Illuminate\Support\Facades\Session::has('error'))
                <div id="error-message" class="px-4 py-2 bg-red-600 text-white rounded-md shadow-sm text-sm mb-5">
                    {{ \Illuminate\Support\Facades\Session::get('error') }}
                </div>
            @endif

            @if(\Illuminate\Support\Facades\Session::has('success'))
                   <div id="success-message" class="px-4 py-2 bg-green-600 text-white rounded-md shadow-sm text-sm mb-5">
                       {{ \Illuminate\Support\Facades\Session::get('success') }}
                   </div>
            @endif

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="fullname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teacher Name</label>
                    <input type="text" name="fullname" id="fullname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter Teacher's Name"/>
                    @error('fullname')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teacher Email</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter Teacher's Email"/>
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="contact_number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Teacher Contact Number</label>
                    <input type="contact_number" name="contact_number" id="contact_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Enter Teacher's Contact Number"/>
                    @error('contact_number')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="faculty" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select faculty</label>
                    <select id="faculty" name="faculty" class="choices bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Select a Faculty</option>
                        @foreach ($faculties as $faculty)
                            <option value="{{ $faculty -> id }}">{{ $faculty -> title }}</option>
                        @endforeach
                    </select>
                    @error('faculty')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select department</label>
                    <select id="department" name="department" class="choices2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">Select a Department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department -> id }}">{{ $department -> title }}</option>
                        @endforeach
                    </select>
                    @error('department')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="designation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select designation</label>
                    <select id="designation" name="designation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Select a Designation</option>
                        @foreach ($designations as $designation)
                            <option value="{{ $designation }}">{{ $designation }}</option>
                        @endforeach
                    </select>
                    @error('designation')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"/>
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign up new Teacher</button>
        </form>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {

        setTimeout(function() {
            var errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 5000); // 5000 milliseconds = 5 seconds

        const itemsSelect = document.getElementById('faculty');
        const choices = new Choices(itemsSelect, {
            searchEnabled: true,
            itemSelectText: '',
        });

        const itemsSelect2 = document.getElementById('department');
        const choices2 = new Choices(itemsSelect2, {
            searchEnabled: true,
            itemSelectText: '',
        });

    });
</script>

@endsection
