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

        $images = "";

        foreach ($request->file('fotos') as $file ) {
            $path = $file->store('public/mascotas');
            $image = str_replace('public/','storage/',$path);
            $images .= "$image,";
        }

        $newMascota = $request->except(['fotos','fecha_nacimiento']);
        $newMascota['fotos'] = substr($images,0,-1); 
        $newMascota['fecha_nacimiento'] = date('Y-m-d', strtotime($request->get('fecha_nacimiento')));

        $mascota = Mascota::create($newMascota);

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
        $updrules = [
            'fotos' => 'nullable'
        ];

        request()->validate(array_replace(Mascota::$rules,$updrules));
        $images = "";

        if($request->hasFile('fotos')){
            foreach ($request->file('fotos') as $file ) {
                $path = $file->store('public/mascotas');
                $image = str_replace('public/','storage/',$path);
                $images .= "$image,";
            }

            $newMascota = $request->except(['fotos','fecha_nacimiento']);
            $newMascota['fotos'] = substr($images,0,-1);
        }
        else{
            $newMascota = $request->except('fecha_nacimiento');
        }

        $newMascota['fecha_nacimiento'] = date('Y-m-d', strtotime($request->get('fecha_nacimiento')));
        $mascota->update($newMascota);

        return redirect()->route('mascotas.index')
            ->with('success', 'Actualizamos tus datos con éxito :)');
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
            ->with('success', 'Eliminado correctamente T_T');
    }
}
