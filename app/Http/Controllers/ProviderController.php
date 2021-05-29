<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

/**
 * Class ProviderController
 * @package App\Http\Controllers
 */
class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $providers = Provider::All();

        return view('provider.index', compact('providers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provider = new Provider();
        return view('provider.create', compact('provider'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Provider::$rules);

        Provider::create($request->all());

        return redirect()->route('providers.index')
            ->with('success', 'Proveedor registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provider = Provider::find($id);

        return view('provider.show', compact('provider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provider = Provider::find($id);

        return view('provider.edit', compact('provider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Provider $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        $updrules = [
            'nombre' => 'required|string|min:4|max:100|unique:providers,nombre,'.$provider->id,
            'correo'=> 'required|string|min:13|max:100|unique:providers,correo,'.$provider->id,
            'numero'=> 'required|digits:9|unique:providers,numero,'.$provider->id,
        ];

        request()->validate(array_replace(Provider::$rules,$updrules));

        $provider->update($request->all());

        return redirect()->route('providers.index')
            ->with('success', 'Se actualizaron los datos del proveedor');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $provider = Provider::find($id)->delete();

        return redirect()->route('providers.index')
            ->with('success', 'Proveedor eliminado con éxito');
    }
}
