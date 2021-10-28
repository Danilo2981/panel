<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Listado de empresas';

        $empresas = Empresa::all();

        return view('empresas.index', compact('title', 'empresas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Nuevo cliente';

        $empresas = Empresa::all();

        return view('empresas.create', compact('title', 'empresas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'nombre' => ['required', Rule::unique('empresas')],
            'ruc' => ['required', Rule::unique('empresas'), 'numeric', 'digits:13']
        ],[
            'nombre.required' => 'El nombre es requerido',
            'nombre.unique' => 'El cliente ya existe',
            'ruc.required' => 'El ruc es requerido',
            'ruc.unique' => 'El ruc ya existe',
            'ruc.numeric' => 'El ruc debe contener solo numeros',
            'ruc.digits' => 'El ruc debe tener 13 digitos'
        ]);

        try {
            Empresa::create([
                'nombre' => $data['nombre'],
                'ruc' => $data['ruc'],
            ]);            
            return redirect()->route('empresas')->with('success', 'Empresa Registrada');
        } catch (\Exception $e) {
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return view('empresas.show', compact('empresa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        $title = 'Editar cliente';

        return view('empresas.edit', [
            'empresa' => $empresa,
            'title' => $title
        ]);

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Empresa $empresa)
    {
        $data = request()->validate([
            'nombre' => ['required', Rule::unique('empresas')],
            'ruc' => ['required', Rule::unique('empresas'), 'numeric', 'digits:13']
        ],[
            'nombre.required' => 'El nombre es requerido',
            'nombre.unique' => 'El cliente ya existe',
            'ruc.required' => 'El ruc es requerido',
            'ruc.unique' => 'El ruc ya existe',
            'ruc.numeric' => 'El ruc debe contener solo numeros',
            'ruc.digits' => 'El ruc debe tener 13 digitos'
        ]);

        // try {
            $empresa->update($data);
            return redirect()->route('empresas.show', ['empresa' => $empresa->id])->with('success', 'Empresa actualizada');
        // } catch (\Exception $e) {
        //     return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
