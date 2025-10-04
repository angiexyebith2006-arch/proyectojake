<?php

namespace App\Http\Controllers\Usuario;

use App\Models\Usuario;
use App\Models\Rol;
use App\Http\Controllers\Controller;
use App\Models\Cargo;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // LISTAR
    public function index()
    {
        $usuario = Usuario::with(['rol', 'cargo'])->get();
        return view('usuario.index', compact('usuario'));
    }

    // CREAR (vista)
    public function create()
    {
        return view('usuario.create', [
            'rol'   => Rol::orderBy('nombre')->get(),
            'cargo' => Cargo::orderBy('nombre')->get(),
        ]);
    }

    // GUARDAR NUEVO
    public function store(StoreUsuarioRequest $request)
    {
       Usuario::create($request->validated());
        return redirect()->route('usuario.index')->with('success', 'Usuario creado correctamente');
    }

    // EDITAR (vista)
    public function edit(Usuario $usuario)
    {
        return view('usuario.edit', [
            'usuario' => $usuario,
            'rol'     => Rol::orderBy('nombre')->get(),
            'cargo'   => Cargo::orderBy('nombre')->get(),
        ]);
    }

    // ACTUALIZAR
   public function update(UpdateUsuarioRequest $request, Usuario $usuario)
{
    $usuario->update($request->validated());
    return redirect()->route('usuario.index')->with('success', 'Usuario actualizado correctamente');
}


    // ELIMINAR
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
        return redirect()->route('usuario.index')->with('success', 'Usuario eliminado correctamente');
    }
}
