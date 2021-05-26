<?php

namespace App\Http\Controllers;

use App\Models\DetalleVentaProducto;
use Illuminate\Http\Request;

/**
 * Class DetalleVentaProductoController
 * @package App\Http\Controllers
 */
class DetalleVentaProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detalleVentaProductos = DetalleVentaProducto::paginate();

        return view('detalle-venta-producto.index', compact('detalleVentaProductos'))
            ->with('i', (request()->input('page', 1) - 1) * $detalleVentaProductos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detalleVentaProducto = new DetalleVentaProducto();
        return view('detalle-venta-producto.create', compact('detalleVentaProducto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(DetalleVentaProducto::$rules);

        $detalleVentaProducto = DetalleVentaProducto::create($request->all());

        return redirect()->route('detalle-venta-productos.index')
            ->with('success', 'DetalleVentaProducto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalleVentaProducto = DetalleVentaProducto::find($id);

        return view('detalle-venta-producto.show', compact('detalleVentaProducto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detalleVentaProducto = DetalleVentaProducto::find($id);

        return view('detalle-venta-producto.edit', compact('detalleVentaProducto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  DetalleVentaProducto $detalleVentaProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetalleVentaProducto $detalleVentaProducto)
    {
        request()->validate(DetalleVentaProducto::$rules);

        $detalleVentaProducto->update($request->all());

        return redirect()->route('detalle-venta-productos.index')
            ->with('success', 'DetalleVentaProducto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $detalleVentaProducto = DetalleVentaProducto::find($id)->delete();

        return redirect()->route('detalle-venta-productos.index')
            ->with('success', 'DetalleVentaProducto deleted successfully');
    }
}
