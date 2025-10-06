<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\StoreRegistroRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $usuarios = Usuario::with(['rol', 'cargo'])->get();
            return response()->json([
                'success' => true,
                'data' => $usuarios
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener los usuarios',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Normalmente en APIs no se usa este método
        return response()->json([
            'message' => 'Use el método POST para crear un usuario'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRegistroRequest $request)
    {
        try {
            DB::beginTransaction();

            $usuario = Usuario::create([
                'id_numero_documento' => $request->id_numero_documento,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'tipo_documento' => $request->tipo_documento,
                'correo_electronico' => $request->correo_electronico,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'bautizo' => $request->bautizo,
                'bautizado_espiritu' => $request->bautizado_espiritu,
                'telefono' => $request->telefono,
                'genero' => $request->genero,
                'contrasena' => Hash::make($request->contrasena),
                'rol_id' => $request->rol_id,
                'cargo_id' => $request->cargo_id,
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Usuario creado exitosamente',
                'data' => $usuario->load(['rol', 'cargo'])
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'success' => false,
                'message' => 'Error al crear el usuario',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $usuario = Usuario::with(['rol', 'cargo'])->find($id);
            
            if (!$usuario) {
                return response()->json([
                    'success' => false,
                    'message' => 'Usuario no encontrado'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $usuario
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el usuario',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        try {
            $usuario = Usuario::with(['rol', 'cargo'])->find($id);
            
            if (!$usuario) {
                return response()->json([
                    'success' => false,
                    'message' => 'Usuario no encontrado'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $usuario
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener el usuario',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $usuario = Usuario::find($id);
            
            if (!$usuario) {
                return response()->json([
                    'success' => false,
                    'message' => 'Usuario no encontrado'
                ], 404);
            }

            // Validación para update
            $validated = $request->validate([
                'nombre' => 'sometimes|string|max:25',
                'apellido' => 'sometimes|string|max:25',
                'correo_electronico' => 'sometimes|email|unique:usuarios,correo_electronico,' . $id,
                'fecha_nacimiento' => 'sometimes|date',
                'bautizo' => 'sometimes|in:si,no',
                'bautizado_espiritu' => 'sometimes|in:si,no',
                'telefono' => 'sometimes|digits:10',
                'genero' => 'sometimes|in:Masculino,Femenino',
                'contrasena' => 'sometimes|string|min:8|max:255',
                'rol_id' => 'sometimes|exists:roles,id',
                'cargo_id' => 'sometimes|exists:cargos,id',
            ]);

            // Si se envía contraseña, hashearla
            if ($request->has('contrasena')) {
                $validated['contrasena'] = Hash::make($request->contrasena);
            }

            $usuario->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Usuario actualizado exitosamente',
                'data' => $usuario->load(['rol', 'cargo'])
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar el usuario',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $usuario = Usuario::find($id);
            
            if (!$usuario) {
                return response()->json([
                    'success' => false,
                    'message' => 'Usuario no encontrado'
                ], 404);
            }

            $usuario->delete();

            return response()->json([
                'success' => true,
                'message' => 'Usuario eliminado exitosamente'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar el usuario',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Método adicional para buscar usuario por documento
     */
    public function buscarPorDocumento($documento)
    {
        try {
            $usuario = Usuario::with(['rol', 'cargo'])
                            ->where('id_numero_documento', $documento)
                            ->first();
            
            if (!$usuario) {
                return response()->json([
                    'success' => false,
                    'message' => 'Usuario no encontrado'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $usuario
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al buscar el usuario',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}