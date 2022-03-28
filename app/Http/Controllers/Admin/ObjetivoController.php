<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Objetivos;

class ObjetivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objetivos = Objetivos::where('estado','activo')->get();
        return view('admin.pages.objetivos.index')->with(compact('objetivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Objetivos::create([
            'idEmpresa' => auth()->user()->idEmpresa,
            'perspectiva' => $request->perspectiva,
            'objetivo' => $request->objetivo,
            'codigo' => $request->codigo,
            'estado' => 'activo'
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $objetivo = Objetivos::find($id);
        $objetivo->perspectiva = $request->perspectiva;
        $objetivo->objetivo = $request->objetivo;
        $objetivo->codigo = $request->codigo;
        $objetivo->save();

        return back();
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

    public function inactivar($id){
        $objetivo = Objetivos::find($id);
        $objetivo->estado = 'inactivo';
        $objetivo->save();

        return back();
    }
}
