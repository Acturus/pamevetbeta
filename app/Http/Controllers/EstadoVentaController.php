<?php

namespace App\Http\Controllers;

use App\Models\EstadoVenta;
use Illuminate\Http\Request;

/**
 * Class EstadoVentaController
 * @package App\Http\Controllers
 */
class EstadoVentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estadoVentas = EstadoVenta::paginate();

        return view('estado-venta.index', compact('estadoVentas'))
            ->with('i', (request()->input('page', 1) - 1) * $estadoVentas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estadoVenta = new EstadoVenta();
        return view('estado-venta.create', compact('estadoVenta'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(EstadoVenta::$rules);

        $estadoVenta = EstadoVenta::create($request->all());

        return redirect()->route('estado-ventas.index')
            ->with('success', 'EstadoVenta created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estadoVenta = EstadoVenta::find($id);

        return view('estado-venta.show', compact('estadoVenta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estadoVenta = EstadoVenta::find($id);

        return view('estado-venta.edit', compact('estadoVenta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  EstadoVenta $estadoVenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstadoVenta $estadoVenta)
    {
        request()->validate(EstadoVenta::$rules);

        $estadoVenta->update($request->all());

        return redirect()->route('estado-ventas.index')
            ->with('success', 'EstadoVenta updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $estadoVenta = EstadoVenta::find($id)->delete();

        return redirect()->route('estado-ventas.index')
            ->with('success', 'EstadoVenta deleted successfully');
    }
}
