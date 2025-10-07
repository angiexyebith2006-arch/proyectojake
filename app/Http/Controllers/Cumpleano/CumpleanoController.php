<?php

namespace App\Http\Controllers\Cumpleano;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCumpleanoRequest;
use App\Models\Cumpleano;
use Illuminate\Http\Request;

class CumpleanoController extends Controller
{
    public function index(Request $request)
    {
        $mes = $request->get('mes', date('n'));
        $anio = $request->get('anio', date('Y'));

        // Validar mes
        $mes = max(1, min(12, $mes));

        $meses = [
            1 => "Enero", 2 => "Febrero", 3 => "Marzo", 4 => "Abril",
            5 => "Mayo", 6 => "Junio", 7 => "Julio", 8 => "Agosto",
            9 => "Septiembre", 10 => "Octubre", 11 => "Noviembre", 12 => "Diciembre"
        ];

        $eventos = [];

        // ================== CUMPLEAÑOS ==================
        $cumpleanos = Cumpleano::whereMonth('fecha_nacimiento', $mes)->get();

        foreach ($cumpleanos as $cumpleano) {
            $diaCumple = date("j", strtotime($cumpleano->fecha_nacimiento));
            $mesCumple = date("n", strtotime($cumpleano->fecha_nacimiento));

            if ($mesCumple == $mes) {
                $fechaCumple = new \DateTime("$anio-$mes-$diaCumple");
                $fechaNac = new \DateTime($cumpleano->fecha_nacimiento);

                $edad = $fechaNac->diff($fechaCumple)->y;

                $eventos[$diaCumple][] = " Cumpleaños de {$cumpleano->nombre} - {$edad} años";
            }
        }

        $primerDia = date("N", strtotime("$anio-$mes-01"));
        $diasMes = date("t", strtotime("$anio-$mes-01"));

        return view('cronograma.index', compact(
            'mes',
            'anio',
            'meses',
            'eventos',
            'primerDia',
            'diasMes',
            'cumpleanos'
        ));
    }

    public function create()
    {
        return view('cronograma.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'codigo_usuario' => 'required|integer'
        ]);

        Cumpleano::create([
            'nombre' => $request->nombre,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'codigo_usuario' => $request->codigo_usuario,
        ]);

        return redirect()->route('cronograma.index')
            ->with('success', 'Cumpleaños registrado correctamente.');
    }

    public function show(string $id)
    {
        $cumpleanos = Cumpleano::findOrFail($id);
        return view('cronograma.show', compact('cumpleanos'));
    }

    public function edit(string $id)
    {
        $cumpleanos = Cumpleano::findOrFail($id);
        return view('cronograma.edit', compact('cumpleanos'));
    }

    public function update(UpdateCumpleanoRequest $request, $id)
    {
        // ✅ Buscar el registro existente
        $cumpleano = Cumpleano::findOrFail($id);

        // ✅ Actualizar con los datos validados
        $cumpleano->update($request->validated());

        // ✅ Redirigir con mensaje de éxito
        return redirect()->route('cronograma.index')
            ->with('success', 'Cumpleaños actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $cumpleanos = Cumpleano::find($id);

        if (!$cumpleanos) {
            return back()->with('error', 'Cumpleaños no encontrado');
        }

        $cumpleanos->delete();
        return back()->with('success', 'Cumpleaños eliminado correctamente');
    }
}

