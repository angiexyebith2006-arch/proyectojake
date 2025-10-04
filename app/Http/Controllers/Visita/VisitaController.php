<?php

namespace App\Http\Controllers\Visita;

use App\Http\Controllers\Controller;
use App\Models\Visita;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\StoreVisitaRequest;
use App\Http\Requests\UpdateVisitaRequest;

class VisitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $visita = Visita::with(['Usuario']) ->get();
        return view ('seguimiento.index', compact('visita'));//
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $ultimoId = Visita::max('id_visita');
    $proximoId = $ultimoId ? $ultimoId + 1 : 1;

    return view('seguimiento.create', [
        'usuario' => Usuario::orderBy('nombre')->get(['id_numero_documento','nombre','apellido']),
        'proximoId' => $proximoId
    ]);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVisitaRequest $request)
    {
        Visita::create($request->validated());
        return redirect()->route('seguimiento.index')->with('Ok','Visita creada');
    }

    /**
     * Display the specified resource.
     */
    public function show(Visita $visita)
    {
        return view('seguimiento.show', compact('visita'));//
    }

   public function edit($id)
{
    $visita = Visita::findOrFail($id);
    return view('seguimiento.edit', compact('visita'));
}
   
    /**
     * Update the specified resource in storage.
     */
public function update(UpdateVisitaRequest $request, Visita $visita)
{
    $visita->update($request->validated());

    return redirect()->route('seguimiento.index')
        ->with('success', 'Visita actualizada correctamente.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $visita = Visita::findOrFail($id);
        $visita->delete();

        return redirect()->route('seguimiento.index')
            ->with('success', 'listo' , 'visita eliminada');
    }
}