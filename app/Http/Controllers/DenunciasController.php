<?php

namespace App\Http\Controllers;

use App\Models\Denuncias;
use App\Models\Usuarios;
use App\Models\Empresas;
use Illuminate\Http\Request;

class DenunciasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $denuncias = Denuncias::all();

    foreach ($denuncias as $denuncia) {
        $empresa = Empresas::find($denuncia->empresas_id);
        $usuario = Usuarios::find($denuncia->usuarios_id);
        $denuncia->empresa = $empresa;
        $denuncia->usuario = $usuario;
    }

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
        $empresas_id = $request->input('empresas_id');
        $paises_id = $request->input('paises_id');
        $estados_id = $request->input('estados_id');
        $nombre = $request->input('nombre');
        $telefono = $request->input('telefono');
        $correo = $request->input('correo');
        $detalle = $request->input('detalle');
        $fecha = $request->input('fecha');
        $contraseña = $request->input('contraseña');
        $numero_centro = $request->input('numero_centro');

        //paso 1 guardar datos en la tabla usuarios
        $usuarios = new Usuarios();
        if ($nombre && $telefono && $correo) {
            $usuarios->nombre = $nombre;
            $usuarios->telefono = $telefono;
            $usuarios->correo = $correo;
        } else {
            // Datos de usuario anónimo
            $usuarios->nombre = 'Anónimo';
            $usuarios->telefono ='Anónimo';
            $usuarios->correo = 'Anónimo';
        }
        
        $usuarios->save();
        
        $usuarios_id = $usuarios->id;

        //paso 2 guardar datos en la tabla denuncias
        $denuncias = new Denuncias;
        $denuncias->empresas_id = $empresas_id;
        $denuncias->paises_id = $paises_id;
        $denuncias->estados_id = $estados_id;
        $denuncias->usuarios_id = $usuarios_id;
        $denuncias->detalle = $detalle;
        $denuncias->fecha = $fecha;
        $denuncias->contraseña = $contraseña;
        $denuncias->folio = $this->generarFolioAutomatico();
        $denuncias->numero_centro = $numero_centro;
        $denuncias->save();
         
        if ($denuncias->save()) {
            // Obtener el ID de la denuncia creada
            $denuncias_id = $denuncias->id;
    
            // Obtener la denuncia completa con todos sus datos
            $denuncias = Denuncias::findOrFail($denuncias_id);
    
            $data = [
                'message' => 'Denuncia creada exitosamente',
                'denuncias' => $denuncias
            ];
    
            return response()->json($data);
        } else {
            return response()->json(['message' => 'Error al crear la denuncia'], 500);
        }
    }

    private function generarFolioAutomatico()
    {
        $folio = mt_rand(10000, 99999);

    return $folio;
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
       
        $denuncias->comentarios = $request->comentarios;
        $denuncias->estatus = $request->estatus;
        $denuncias->save();
         $data =[
            'message' => 'denuncia actualizada exitosamente',
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