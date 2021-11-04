@extends('admin.dashboard')

@section('title', 'Empresas')

@section('content')
    <p class="text-xl pb-3 flex items-center">
        <i class="fas fa-list mr-3"></i> {{ $title }}
    </p>
    <div>
        <a href="{{ route('users.create') }}">
            <button class="w-64 bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> Nuevo Usuario
            </button>
        </a>
    </div>    
    <div class="w-full mt-6 pl-0 lg:pl-2">
        <div class="leading-loose">
            <p class="text-lg text-gray-800 font-medium pb-4">Información del usuario</p>
            @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 mb-4 rounded relative" role="alert">
                <strong class="font-bold">Ups!</strong>
                <span class="block sm:inline">Algo esta pasando.</span>
            </div>
            @endif
            <form class="p-10 bg-white rounded shadow-xl" action="{{ route('users.store') }}" method="POST">
                {{ method_field('POST') }}
                {{ csrf_field() }}
                <div class="flex">
                    <div class="w-full lg:w-1/2 mr-2">
                        <label class="block text-sm text-gray-600" for="name">Nombre</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" placeholder="Nombre del Usuario" value="{{ old('name') }}" aria-label="Name">
                    </div>
                    @if ($errors->has('name'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 mt-2 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ $errors->first('name') }}</span>
                    </div>
                    @endif
                    <div class="w-full lg:w-1/2 ml-2">
                        <label class="block text-sm text-gray-600" for="password">Password</label>
                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="password" placeholder="Password del Usuario" aria-label="Password">
                    </div>
                    @if ($errors->has('password'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 mt-2 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ $errors->first('password') }}</span>
                    </div>    
                    @endif
                </div>
                <div class="flex">
                    <div class="w-full lg:w-1/2 mr-2">
                        <label class="block text-sm text-gray-600" for="email">e-mail</label>
                        <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="email" placeholder="E-mail del Usuario" value="{{ old('email') }}" aria-label="Email">
                    </div>
                    @if ($errors->has('email'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 mt-2 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ $errors->first('email') }}</span>
                    </div>    
                    @endif
                    <div class="w-full lg:w-1/2 ml-2">
                        <label class="block text-sm text-gray-600" for="website">Website</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="website" name="website" type="text" placeholder="Web del Usuario" value="{{ old('website') }}" aria-label="Web">
                    </div>
                    @if ($errors->has('website'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 mt-2 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ $errors->first('website') }}</span>
                    </div>
                    @endif
                    
                </div>
                <div class="flex">
                    <div class="w-full lg:w-1/2 mr-2">
                        <label class="block text-sm text-gray-600" for="job_title">Titulo</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="job_title" name="job_title" type="text" placeholder="Titulo del Usuario" value="{{ old('job_title') }}" aria-label="Job_title">
                    </div>
                    @if ($errors->has('job_title'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 mt-2 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ $errors->first('job_title') }}</span>
                    </div>
                    @endif
                    <div class="w-full lg:w-1/2 ml-2">
                        <label class="block text-sm text-gray-600" for="twitter">Twitter</label>
                        <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="twitter" name="twitter" type="text" placeholder="Twitter del Usuario" value="{{ old('twitter') }}" aria-label="Twitter">
                    </div>
                    @if ($errors->has('twitter'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 mt-2 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ $errors->first('twitter') }}</span>
                    </div>
                    @endif                    
                </div>
                <div class="flex place-content-center">
                    <div class="w-full content-center lg:w-1/2">
                        <label class="block text-sm text-gray-600 mt-2" for="bio">Bio</label>
                        <textarea class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="bio" name="bio" type="text" placeholder="Nombre del Usuario" value="{{ old('bio') }}" aria-label="Bio"></textarea>
                    </div>
                    @if ($errors->has('bio'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 mt-2 rounded relative" role="alert">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">{{ $errors->first('bio') }}</span>
                    </div>
                    @endif    
                </div>
                <div class="flex place-content-center">
                    <div class="mt-6 lg:w-1/2">
                        <button type="submit" class="w-full bg-blue-600 cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                            <i class="fas fa-arrow-circle-up mr-3"></i> Crear Usuario
                        </button>
                    </div>      
                </div>     
                              
            </form>
        </div>
        
    </div>
@endsection