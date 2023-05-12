<?php

namespace App\Http\Controllers;

use App\Models\Estados;
use Illuminate\Http\Request;

class EstadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estados=Estados::all();
        return response()->json($estados);
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
        $estados = new Estados;
        $estados->nombre = $request->nombre;
        $estados->paises_id = $request->paises_id;
        $estados->save();
         $data =[
            'message' => 'Estado creado exitosamente',
            'estados' =>$estados
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Estados $estados)
    {
        return response()->json($estados);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estados $estados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estados $estados)
    {
        $estados->nombre = $request->nombre;
        $estados->paises_id = $request->paises_id;
        $estados->save();
         $data =[
            'message' => 'Estado actualizado exitosamente',
            'estados' =>$estados
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estados $estados)
    {
        $estados->delete();
        $data=[
            'message' => 'Estado eliminado exitosamente',
            'estados' =>$estados
        ];
        return response()->json($data);
    }
  
}
