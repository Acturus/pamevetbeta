<?php

namespace App\Http\Controllers;

use App\Models\DetalleVentaServicio;
use Illuminate\Http\Request;

/**
 * Class DetalleVentaServicioController
 * @package App\Http\Controllers
 */
class DetalleVentaServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalleVentaServicios = DetalleVentaServicio::paginate();

        return view('detalle-venta-servicio.index', compact('detalleVentaServicios'))
            ->with('i', (request()->input('page', 1) - 1) * $detalleVentaServicios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detalleVentaServicio = new DetalleVentaServicio();
        return view('detalle-venta-servicio.create', compact('detalleVentaServicio'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DetalleVentaServicio::$rules);

        $detalleVentaServicio = DetalleVentaServicio::create($request->all());

        return redirect()->route('detalle-venta-servicios.index')
            ->with('success', 'DetalleVentaServicio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalleVentaServicio = DetalleVentaServicio::find($id);

        return view('detalle-venta-servicio.show', compact('detalleVentaServicio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detalleVentaServicio = DetalleVentaServicio::find($id);

        return view('detalle-venta-servicio.edit', compact('detalleVentaServicio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DetalleVentaServicio $detalleVentaServicio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleVentaServicio $detalleVentaServicio)
    {
        request()->validate(DetalleVentaServicio::$rules);

        $detalleVentaServicio->update($request->all());

        return redirect()->route('detalle-venta-servicios.index')
            ->with('success', 'DetalleVentaServicio updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detalleVentaServicio = DetalleVentaServicio::find($id)->delete();

        return redirect()->route('detalle-venta-servicios.index')
            ->with('success', 'DetalleVentaServicio deleted successfully');
    }
}
