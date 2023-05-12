<?php

namespace App\Http\Controllers;

use App\Models\Paises;
use Illuminate\Http\Request;

class PaisesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paises=Paises::all();
        return response()->json($paises);
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
        $paises = new Paises;
        $paises->nombre = $request->nombre;
        $paises->save();
         $data =[
            'message' => 'Pais creado exitosamente',
            'paises' =>$paises
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Paises $paises)
    {
        return response()->json($paises);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paises $paises)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paises $paises)
    {
        $paises->nombre = $request->nombre;
        $paises->save();
         $data =[
            'message' => 'Pais actualizado exitosamente',
            'paises' =>$paises
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paises $paises)
    {
        $paises->delete();
        $data=[
            'message' => 'Pais eliminado exitosamente',
            'paises' =>$paises
        ];
        return response()->json($data);
    }
}
