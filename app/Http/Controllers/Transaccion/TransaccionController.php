<?php

namespace App\Http\Controllers\Transaccion;

use App\Http\Controllers\Controller;
use App\Models\Transaccion;
use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTransaccionRequest;
use App\Http\Requests\UpdateTransaccionRequest;


class TransaccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaccion = Transaccion::with(['Usuario']) ->get();
        return view ('finanzas.index', compact('transaccion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('finanzas.create',[
            'usuario'   => Usuario::orderBy('nombre')->get(['id_numero_documento','nombre','apellido']),
         ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransaccionRequest $request)
    {
        Transaccion::create($request->validated());
        return redirect()->route('finanzas.index')->with('ok','Movimiento Creado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaccion $transaccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaccion $transaccion)
    {
        return view('finanzas.edit',[
        'transaccion'   => $transaccion,
        'usuario'       => Usuario::orderBy('nombre')->get(['id_numero_documento','nombre','apellido']),
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaccionRequest $request, Transaccion $transaccion)
    {
        $transaccion->update($request->validated());
        return redirect()->route('finanzas.index')->with('ok','Movimiento Actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
  public function destroy($id)
{
    $transaccion = Transaccion::find($id);
    if(!$transaccion) {
        return back()->with('error','Transacción no encontrada');
    }
    $transaccion->delete();
    return back()->with('ok','Movimiento Eliminado');
}
    }

