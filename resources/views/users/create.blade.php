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
    <div class="w-full lg:w-3/5 mt-6 pl-0 lg:pl-2">
        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" action="{{ route('users.store') }}" method="POST">
                {{ method_field('POST') }}
                {{ csrf_field() }}
                <p class="text-lg text-gray-800 font-medium pb-4">Información del usuario</p>
                <div class="w-full lg:w-3/5 mt-6 pl-0 lg:pl-2">
                    <div class="leading-loose">
                        <form class="p-10 bg-white rounded shadow-xl" action="{{ route('users.store') }}" method="POST">
                            @method('POST')
                            @csrf
                            <div class="w-full">
                                <label class="block text-sm text-gray-600" for="name">Nombre</label>
                                <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="name" name="name" type="text" placeholder="Nombre del Usuario" aria-label="Name">
                            </div>
                            <div class="w-full mt-2">
                                <label class="block text-sm text-gray-600" for="email">e-mail</label>
                                <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="email" name="email" type="email" placeholder="E-mail del Usuario" aria-label="Email">
                            </div>
                            <div class="w-full mt-2">
                                <label class="block text-sm text-gray-600" for="password">Password</label>
                                <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="password" name="password" type="password" placeholder="Password del Usuario" aria-label="Password">
                            </div>
                            @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <span class="flex items-center font-medium tracking-wide text-red-500 text-xs mt-1 ml-1">
                                {{ $error }}
                            </span>
                            @endforeach        
                            @endif
                            <div class="mt-6">
                                <button type="submit" class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                                    <i class="fas fa-arrow-circle-up mr-3"></i> Crear Usuario
                                </button>
                            </div>                
                        </form>
                    </div>
                </div>               
            </form>
        </div>
    </div>
@endsection