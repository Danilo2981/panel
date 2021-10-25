@extends('admin.dashboard')

@section('title', 'Empresas')

@section('content')
    <p class="text-xl pb-3 flex items-center">
        <i class="fas fa-list mr-3"></i> {{ $title }}
    </p>
    <div>
        <a href="{{ route('empresas.create') }}">
            <button class="w-64 bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> Nuevo Cliente
            </button>
        </a>
    </div>    
    <div class="w-full lg:w-3/5 mt-6 pl-0 lg:pl-2">
        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" action="{{ route('empresas.store') }}" method="POST">
                @method('POST')
                @csrf
                <p class="text-lg text-gray-800 font-medium pb-4">Información del cliente</p>
                <div class="w-1/2">
                    <label class="block text-sm text-gray-600" for="cus_name">Nombre</label>
                    <input class="w-full px-5 py-1 text-gray-700 bg-gray-200 rounded" id="nombre" name="nombre" type="text" required="" placeholder="Nombre del Cliente" aria-label="Name">
                </div>
                <div class="w-1/2 mt-2">
                    <label class="block text-sm text-gray-600" for="cus_email">Ruc</label>
                    <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" id="ruc" name="ruc" type="text" required="" placeholder="Ruc del Cliente" aria-label="Ruc">
                </div>
                <div class="mt-6">
                    <button type="submit" class="w-full bg-white cta-btn font-semibold py-2 mt-3 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                        <i class="fas fa-arrow-circle-up mr-3"></i> Crear Cliente
                    </button>
                </div>                
            </form>
        </div>
    </div>
@endsection