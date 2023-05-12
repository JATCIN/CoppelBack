<?php

namespace App\Http\Controllers;

use App\Models\Denuncias;
use Illuminate\Http\Request;

class DenunciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $denuncias=Denuncias::all();
        return response()->json($denuncias);
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
        $denuncias = new Denuncias;
        $denuncias->empresas_id = $request->empresas_id;
        $denuncias->paises_id = $request->paises_id;
        $denuncias->estados_id = $request->estados_id;
        $denuncias->usuarios_id = $request->usuarios_id;
        $denuncias->detalle = $request->detalle;
        $denuncias->fecha = $request->fecha;
        $denuncias->contraseña = $request->contraseña;
        $denuncias->folio = $request->folio;
        $denuncias->numero_centro = $request->numero_centro;
        $denuncias->comentarios = $request->comentarios;
        $denuncias->estatus = $request->estatus;
        $denuncias->save();
         $data =[
            'message' => 'denuncia creada exitosamente',
            'denuncias' =>$denuncias
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Denuncias $denuncias)
    {
        return response()->json($denuncias);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Denuncias $denuncias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Denuncias $denuncias)
    {
        $denuncias->empresas_id = $request->empresas_id;
        $denuncias->paises_id = $request->paises_id;
        $denuncias->estados_id = $request->estados_id;
        $denuncias->usuarios_id = $request->usuarios_id;
        $denuncias->detalle = $request->detalle;
        $denuncias->fecha = $request->fecha;
        $denuncias->contraseña = $request->contraseña;
        $denuncias->folio = $request->folio;
        $denuncias->numero_centro = $request->numero_centro;
        $denuncias->comentarios = $request->comentarios;
        $denuncias->estatus = $request->estatus;
        $denuncias->save();
         $data =[
            'message' => 'denuncia creada exitosamente',
            'denuncias' =>$denuncias
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Denuncias $denuncias)
    {
        $denuncias->delete();
        $data=[
            'message' => 'denuncia eliminada exitosamente',
            'denuncias' =>$denuncias
        ];
        return response()->json($data);
    }

    public function seguimientoDenuncia(Request $request)
    {
        $folio = $request->input('folio');
        $contraseña = $request->input('contraseña');

        // Realiza la consulta a la base de datos para comprobar los datos
        $denuncias = Denuncias::where('folio', $folio)
            ->where('contraseña', $contraseña)
            ->first();

        if ($denuncias) {
            
            return response()->json($denuncias);
        } else {
            // No se encontró la denuncia, devuelve una respuesta adecuada
            return response()->json(['message' => 'No se encontró la denuncia'], 404);
        } 
}
}