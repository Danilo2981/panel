@extends('admin.dashboard')

@section('title', "Usuario {$user->id}")

@section('content')
    
<!-- Profile Card -->
<div>
    <h2>Usuario #{{ $user->id }}</h2>
    <div class="md:grid grid-cols-4 grid-rows-2  bg-white gap-2 p-4 rounded-xl">
         <div class="md:col-span-1 h-48 shadow-xl ">
                 <div class="flex w-full h-full relative">
                     <img src={{ $user->image }} class="w-44 h-44 m-auto" alt=""> 
                 </div>
         </div>
         <div class="md:col-span-3 h-48 shadow-xl p-4 space-y-2 p-3">
                 <div class="flex ">
                     <span
                         class="text-sm border bg-blue-50 font-bold uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Name:</span>
                     <input 
                         class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                         type="text" value={{ $user->name }}  readonly/>
                 </div>
                 <div class="flex ">
                     <span
                         class="text-sm border bg-blue-50 font-bold uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Email:</span>
                     <input 
                         class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                         type="text" value={{ $user->email }}  readonly/>
                 </div>
                  <div class="flex ">
                     <span
                         class="text-sm border bg-blue-50 font-bold uppercase border-2 rounded-l px-4 py-2 bg-gray-50 whitespace-no-wrap w-2/6">Role:</span>
                     <input 
                         class="px-4 border-l-0 cursor-default border-gray-300 focus:outline-none  rounded-md rounded-l-none shadow-sm -ml-1 w-4/6"
                         type="text" value={{ $user->is_admin }}  readonly/>
                 </div>
         </div>
         <div class="md:col-span-3 h-48 shadow-xl p-4 space-y-2 hidden md:block">
             <h3 class="font-bold uppercase"> Profile Description</h3>
             <p class=""> 
                 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget laoreet diam, id luctus lectus. Ut consectetur nisl ipsum, et faucibus sem finibus vitae. Maecenas aliquam dolor at dignissim commodo. Etiam a aliquam tellus, et suscipit dolor. Proin auctor nisi velit, quis aliquet sapien viverra a. 
             </p>
             <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
             <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
             <span class="relative">
                 <a href="{{ route('users') }}">Ver lista de usuarios.</a>
             </span>
         </span>
         </div>
             
     </div>
 </div>

@endsection