<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">
</head>

<body class="bg-gray-100">
  
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-5 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <i class="fas fa-bars w-6 h-6"></i>
                    </button>
                    <a href="#" class="flex ms-2 md:me-24">
                        <img src="{{ asset('images/HSTU_Logo (1).png') }}" class="h-8 me-3" alt="HSTU Logo" />
                        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Learning Management System</span>
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                    {{session('curr_user')->fullname}}
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                    {{session('curr_user')->email}}
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    @if(session('user_role') == 'teacher')
                                        <a href="{{ route('gotoTeacherDashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                                    @elseif(session('user_role') == 'teacher')
                                        <a href="{{ route('gotoAdminDashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                                    @endif
                                </li>
                                <li>
                                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
            @if(session('user_role') == 'teacher')
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="{{ route('gotoTeacherDashboard') }}" class="flex {{ request()->routeIs('gotoTeacherDashboard') ? 'text-gray-700 rounded-lg bg-green-200 hover:bg-gray-100' : 'text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }} items-center p-2 group">
                            <i class="fas fa-tachometer-alt w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                            <span class="ms-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('gotoDistributeCoursePage') }}" class="flex {{ request()->routeIs('gotoDistributeCoursePage') ? 'text-gray-700 rounded-lg bg-green-200 hover:bg-gray-100' : 'text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }} items-center p-2 group">
                            <i class="fas fa-book-open w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                            <span class="ms-3">Distribute Courses</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex {{ request()->routeIs('gotoStudentDashboard') ? 'text-gray-700 rounded-lg bg-green-200 hover:bg-gray-100' : 'text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }} items-center p-2 group">
                            <i class="fas fa-chalkboard-teacher w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                            <span class="ms-3">Your Courses</span>
                        </a>
                    </li>
                </ul>
            @elseif(session('user_role') == 'admin')
                <ul class="space-y-2 font-medium">
                    <li>
                        <a href="{{ route('gotoAdminDashboard') }}" class="flex {{ request()->routeIs('gotoAdminDashboard') ? 'text-gray-700 rounded-lg bg-green-200 hover:bg-gray-100' : 'text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }} items-center p-2 group">
                            <i class="fas fa-tachometer-alt w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                            <span class="ms-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('gotoAddCoursePage') }}" class="flex {{ request()->routeIs('gotoAddCoursePage') ? 'text-gray-700 rounded-lg bg-green-200 hover:bg-gray-100' : 'text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }} items-center p-2 group">
                            <i class="fas fa-book-open w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                            <span class="ms-3">Add Course</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('gototeacherSignupPage') }}" class="flex {{ request()->routeIs('gototeacherSignupPage') ? 'text-gray-700 rounded-lg bg-green-200 hover:bg-gray-100' : 'text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }} items-center p-2 group">
                            <i class="fas fa-user-plus w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                            <span class="ms-3">Add Teacher</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('gotostudentSignupPage') }}" class="flex {{ request()->routeIs('gotostudentSignupPage') ? 'text-gray-700 rounded-lg bg-green-200 hover:bg-gray-100' : 'text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }} items-center p-2 group">
                            <i class="fas fa-user-plus w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                            <span class="ms-3">Add Student</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('gotoAddFacultyPage') }}" class="flex {{ request()->routeIs('gotoAddFacultyPage') ? 'text-gray-700 rounded-lg bg-green-200 hover:bg-gray-100' : 'text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }} items-center p-2 group">
                            <i class="fas fa-chalkboard-teacher w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                            <span class="ms-3">Add Faculty</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('gotoAddDepartmentPage') }}" class="flex {{ request()->routeIs('gotoAddDepartmentPage') ? 'text-gray-700 rounded-lg bg-green-200 hover:bg-gray-100' : 'text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }} items-center p-2 group">
                            <i class="fas fa-building w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                            <span class="ms-3">Add Department</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('gotoAddDegreePage') }}" class="flex {{ request()->routeIs('gotoAddDegreePage') ? 'text-gray-700 rounded-lg bg-green-200 hover:bg-gray-100' : 'text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700' }} items-center p-2 group">
                            <i class="fas fa-building w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                            <span class="ms-3">Add Degree</span>
                        </a>
                    </li>

                </ul>
            @endif
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
        <div class="p-4 mt-14">
            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
    <script src="https://kit.fontawesome.com/dbf830dbab.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

</body>
</html>
