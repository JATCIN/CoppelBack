<?php

namespace App\Http\Controllers;

use App\Models\Empresas;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas=Empresas::all();
        return response()->json($empresas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $empresas = new Empresas;
        $empresas->nombre = $request->nombre;
        $empresas->save();
         $data =[
            'message' => 'Empresa creada exitosamente',
            'empresas' =>$empresas
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Empresas $empresas)
    {
        return response()->json($empresas);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empresas $empresas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empresas $empresas)
    {
        $empresas->nombre = $request->nombre;
        $empresas->save();
         $data =[
            'message' => 'Empresa actualizada exitosamente',
            'empresas' =>$empresas
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empresas $empresas)
    {
        $empresas->delete();
        $data=[
            'message' => 'denuncia eliminada exitosamente',
            'empresas' =>$empresas
        ];
        return response()->json($data);
    }
}
