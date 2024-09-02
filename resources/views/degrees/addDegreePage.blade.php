@extends('layouts.master')

@section('content')
<div class="container mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="flex flex-col w-full bg-white border-gray-200 rounded-lg sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700  min-h-full">
                    <form class="space-y-6" action="{{ route('createDegree') }}" method="POST" enctype="multipart/form-data">
                        <h5 class="text-xl font-medium text-gray-900 dark:text-white">Create Degrees</h5>
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
                        <div>
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                            <input type="title" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="B.Sc. in Agriculture"/>
                            @error('title')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="faculty" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Faculty</label>
                            <select id="faculty" name="faculty" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Select a Faculty</option>    
                                @foreach ($faculties as $faculty)
                                    <option value="{{ $faculty -> id }}">{{ $faculty -> title }}</option>
                                @endforeach
                            </select>
                            @error('faculty')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create Degree</button>
                        
                        
                    </form>
        </div>
        <div class="flex flex-col w-full bg-white border-gray-200 rounded-lg sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700  min-h-full">
            <h5 class="text-xl mb-5 font-medium text-gray-900 dark:text-white">Degrees:</h5>
            
            <ul class="space-y-4 text-left text-gray-500 dark:text-gray-400">
                @foreach($degrees as $degree)
                <li class="flex items-center space-x-3 rtl:space-x-reverse">
                    <svg class="flex-shrink-0 w-3.5 h-3.5 text-green-500 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                    </svg>
                    <span class="font-dark text-gray-900 dark:text-white">{{$degree -> title}}</span>
                </li>
                @endforeach
            </ul>
        </div> 
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

    });
</script>
@endsection