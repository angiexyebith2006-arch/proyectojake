<?php

namespace App\Http\Controllers\Actividad;

use App\Http\Controllers\Controller;
use App\Models\Actividad;
use App\Http\Requests\StoreActividadRequest;
use App\Http\Requests\UpdateActividadRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ActividadController extends Controller
{
    /**
     * Mostrar lista de actividades.
     */
    public function index()
    {
        $actividades = Actividad::orderBy('fecha', 'desc')
                               ->orderBy('hora', 'desc')
                               ->get();
        return view('actividades.index', compact('actividades'));
    }

    /**
     * Mostrar formulario de creación.
     */
    public function create()
    {
        return view('actividades.create');
    }

    /**
     * Guardar nueva actividad usando StoreActividadRequest.
     */
    public function store(StoreActividadRequest $request)
    {
        try {
            \Log::info('Datos recibidos en store:', $request->all());
            
            // Los datos ya están validados por StoreActividadRequest
            $validated = $request->validated();

            // Convertir hora al formato TIME de MySQL (agregar segundos)
            $validated['hora'] = $validated['hora'] . ':00';

            \Log::info('Datos antes de crear:', $validated);

            Actividad::create($validated);

            return redirect()->route('actividades.index')
                ->with('success', 'Actividad creada exitosamente.');

        } catch (\Exception $e) {
            \Log::error('Error completo: ' . $e->getMessage());
            \Log::error('Trace: ' . $e->getTraceAsString());
            
            return redirect()->back()
                ->with('error', 'Error al crear la actividad: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Mostrar formulario de edición.
     */
    public function edit($id)
    {
        $actividad = Actividad::find($id);
       
        if (!$actividad) {
            return redirect()->route('actividades.index')
                ->with('error', 'Actividad no encontrada.');
        }
        
        return view('actividades.edit', compact('actividad'));
    }

    /**
     * Actualizar actividad.
     */
    public function update(Request $request, $id)
    {
        $actividad = Actividad::find($id);
        
        if (!$actividad) {
            return redirect()->route('actividades.index')
                ->with('error', 'Actividad no encontrada.');
        }

        $validated = $request->validate([
            'motivo' => 'required|string|max:200',
            'lugar' => 'required|string|max:200',
            'responsable' => 'required|string|max:100',
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required|date_format:H:i',
            'mensaje' => 'nullable|string|max:255'
        ]);

        $actividad->update($validated);

        return redirect()->route('actividades.index')
            ->with('success', 'Actividad actualizada exitosamente.');
    }

    /**
     * Eliminar actividad.
     */
    public function destroy($id)
    {
        try {
            $actividad = Actividad::findOrFail($id);
            $actividad->delete();

            return redirect()->route('actividades.index')
                ->with('success', 'Actividad eliminada exitosamente.');
                
        } catch (\Exception $e) {
            return redirect()->route('actividades.index')
                ->with('error', 'Error al eliminar la actividad: ' . $e->getMessage());
        }
    }

    /**
     * Mostrar actividad específica.
     */
    public function show($id)
    {
        $actividad = Actividad::find($id);
        
        if (!$actividad) {
            return redirect()->route('actividades.index')
                ->with('error', 'Actividad no encontrada.');
        }
        
        return view('actividades.show', compact('actividad'));
    }
}