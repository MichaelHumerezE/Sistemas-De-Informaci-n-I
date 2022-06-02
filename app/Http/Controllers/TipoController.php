<?php

namespace App\Http\Controllers;

use App\Models\tipo;
use App\Http\Requests\StoretipoRequest;
use App\Http\Requests\UpdatetipoRequest;

class TipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['tipos'] = tipo::paginate(10);
        return view('tipo.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoretipoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretipoRequest $request)
    {
        $datostipo = tipo::create($request->validated());
        $datostipo = request()->except(['_token']);
        return redirect('tipo')->with('mensaje','Tipo De Producto Agregado Con Éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function show(tipo $tipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipo = tipo::findOrFail($id);
        return view('tipo.edit', compact('tipo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetipoRequest  $request
     * @param  \App\Models\tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetipoRequest $request, $id)
    {
        $datosTipo = request()->except(['_token', '_method']);
        tipo::where('id','=', $id)->update($datosTipo);
        return redirect('tipo')->with('mensaje','Datos Actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tipo  $tipo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        tipo::destroy($id);
        return redirect('tipo')->with('mensaje', 'Tipo De Producto Borrado');
    }
}
