@extends('dashboard')

@section('content')
    <section class="relative py-16 bg-blueGray-50">
        <div class="w-full mb-12 px-4">
          <div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded 
          bg-pink-900 text-white">
            <div class="rounded-t mb-0 px-4 py-3 border-0">
              <div class="flex flex-wrap items-center">
                <div class="relative w-full px-4 max-w-full flex-grow flex-1 ">
                  <h3 class="font-semibold text-lg text-white">Usuarios</h3>
                </div>
              </div>
            </div>
            <div class="block w-full overflow-x-auto ">
              <table class="items-center w-full bg-transparent border-collapse">
                <thead>
                  <tr>
                    <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">ID</th>
                    <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">Nombre</th>
                    <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">Email</th>
                    <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700">Options </th>
                    <th class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left bg-pink-800 text-pink-300 border-pink-700"></th>
                  </tr>
                </thead>
        
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">{{ $user->id }}</td>
                        <th class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-left flex items-center">
                            <img src="https://demos.creative-tim.com/notus-js/assets/img/team-1-800x800.jpg" alt="..." class="w-10 h-10 rounded-full border-2 border-blueGray-50 shadow">
                          <span class="ml-3 font-bold text-white"> {{ $user->name }} </span></th>
                        <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                          <i class="fas fa-circle text-orange-500 mr-2"></i>{{ $user->email }}</td>
                          <td class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">Eliminar</td>                    </tr>  
                    @endforeach  
                </tbody>
              </table>
            </div>
          </div>
        </div>
            <footer class="relative pt-8 pb-6 mt-8">
              <div class="container mx-auto px-4">
                <div class="flex flex-wrap items-center md:justify-between justify-center">
                  <div class="w-full md:w-6/12 px-4 mx-auto text-center">
                    <div class="text-sm text-blueGray-500 font-semibold py-1">
                      Made with DVEGA & ADAVILA.
                    </div>
                  </div>
                </div>
              </div>
            </footer>
        </section>
@endsection