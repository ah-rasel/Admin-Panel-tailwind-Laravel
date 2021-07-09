@extends('layouts.admin')
@section('content')
@can('dashboard_access')
<!-- Cards -->
<div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4 mt-5">
    <!-- Card Users -->
    <a class="group" href="{{route('admin.users.index')}}">
        <div class="flex items-center p-4 bg-white group-hover:bg-gray-100 rounded-lg shadow-xs dark:bg-gray-800 dark:group-hover:bg-gray-700">
            <div class="p-3 mr-4 text-green-500 group-hover:text-green-600 bg-green-100 group-hover:bg-green-200 rounded-full dark:text-green-100 dark:bg-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-600 group-hover:text-gray-800 dark:text-gray-400 dark:group-hover:text-gray-400">
                    Users
                </p>
                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                    {{$users}}
                </p>
            </div>
        </div>
    </a>
</div>
@else
    <div class="">
        <p>You are in the Dashboard</p>
    </div>
@endcan
@endsection