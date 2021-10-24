@extends('admin.dashboard')

{{-- @section('title') --}}

@section('content')
    
<div class="bg-gradient-to-r from-purple-300 to-blue-200">
    <div class="w-9/12 m-auto py-16 min-h-screen flex items-center justify-center">
      <div class="bg-white shadow overflow-hidden sm:rounded-lg pb-8">
        <div class="border-t border-gray-200 text-center pt-8">
          <h1 class="text-9xl font-bold text-purple-400">404</h1>
          <h1 class="text-6xl font-medium py-8">oops! Page not found</h1>
          <p class="text-2xl pb-8 px-12 font-medium">Oops! The page you are looking for does not exist. It might have been moved or deleted.</p>
          <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
            <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
            <span class="relative">
                <a href="{{ route('users') }}">Back to Home</a>
            </span>
        </div>
      </div>
    </div>
  </div>

@endsection