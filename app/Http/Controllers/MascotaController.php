<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\EspecieMascota;
use App\Models\Mascota;
use Illuminate\Http\Request;

/**
 * Class MascotaController
 * @package App\Http\Controllers
 */
class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mascotas = Mascota::paginate();

        return view('mascota.index', compact('mascotas'))
            ->with('i', (request()->input('page', 1) - 1) * $mascotas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mascota = new Mascota();
        $clientes = Cliente::all();
        $especies = EspecieMascota::all();
        
        return view('mascota.create',[
            'mascota' => $mascota,
            'clientes' => $clientes,
            'especies' => $especies
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Mascota::$rules);

        $mascota = Mascota::create($request->all());

        return redirect()->route('mascotas.index')
            ->with('success', 'Hemos registrado correctamente a un nuevo amigo de la familia Pamevet');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mascota = Mascota::find($id);

        return view('mascota.show', compact('mascota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mascota = Mascota::find($id);
        $clientes = Cliente::all();
        $especies = EspecieMascota::all();

        return view('mascota.edit',[
            'mascota' => $mascota,
            'clientes' => $clientes,
            'especies' => $especies
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Mascota $mascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mascota $mascota)
    {
        request()->validate(Mascota::$rules);

        $mascota->update($request->all());

        return redirect()->route('mascotas.index')
            ->with('success', 'Mascota updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {


        $mascota = Mascota::find($id)->delete();

        return redirect()->route('mascotas.index')
            ->with('success', 'Eliminado correcamente T_T');
    }
}
