<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios=Usuarios::all();
        return response()->json($usuarios);
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
        $usuarios = new Usuarios;
        $usuarios->nombre = $request->nombre;
        $usuarios->correo = $request->correo;
        $usuarios->telefono = $request->telefono;
        $usuarios->save();

        $data=[
            'message' => 'usuario creado exitosamente',
            'usuarios' => $usuarios
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuarios $usuarios)
    {
        return response()->json($usuarios);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuarios $usuarios)
    {
        $usuarios->nombre = $request->nombre;
        $usuarios->correo = $request->correo;
        $usuarios->telefono = $request->telefono;
        $usuarios->save();

        $data=[
            'message' => 'usuario creado exitosamente',
            'usuarios' => $usuarios
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuarios $usuarios)
    {
        $usuarios->delete();
        $data=[
            'message' => 'denuncia eliminada exitosamente',
            'usuarios' =>$usuarios
        ];
        return response()->json($data);
    }

    public function attach(Request $request)
    {
        $usuarios = Usuarios::find($request->usuarios_id);
        $usuarios->denuncias()->attach($request->denuncias_id);
        $data=[
            'message' => 'denucnia agregada exitosamente',
            'usuarios' => $usuarios
        ];
        return rsponse()->json($data);
    }
}