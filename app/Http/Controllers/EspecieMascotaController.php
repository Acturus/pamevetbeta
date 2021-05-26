<?php

namespace App\Http\Controllers;

use App\Models\EspecieMascota;
use Illuminate\Http\Request;

/**
 * Class EspecieMascotaController
 * @package App\Http\Controllers
 */
class EspecieMascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especieMascotas = EspecieMascota::paginate();

        return view('especie-mascota.index', compact('especieMascotas'))
            ->with('i', (request()->input('page', 1) - 1) * $especieMascotas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especieMascota = new EspecieMascota();
        return view('especie-mascota.create', compact('especieMascota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EspecieMascota::$rules);

        $especieMascota = EspecieMascota::create($request->all());

        return redirect()->route('especie-mascotas.index')
            ->with('success', 'Ha creado la especie correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $especieMascota = EspecieMascota::find($id);

        return view('especie-mascota.show', compact('especieMascota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $especieMascota = EspecieMascota::find($id);

        return view('especie-mascota.edit', compact('especieMascota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EspecieMascota $especieMascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EspecieMascota $especieMascota)
    {
        request()->validate(EspecieMascota::$rules);

        $especieMascota->update($request->all());

        return redirect()->route('especie-mascotas.index')
            ->with('success', 'EspecieMascota updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $especieMascota = EspecieMascota::find($id)->delete();

        return redirect()->route('especie-mascotas.index')
            ->with('success', 'EspecieMascota deleted successfully');
    }
}
