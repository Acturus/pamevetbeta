<?php

namespace App\Http\Controllers;

use App\Models\StockProducto;
use Illuminate\Http\Request;

/**
 * Class StockProductoController
 * @package App\Http\Controllers
 */
class StockProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stockProductos = StockProducto::paginate();

        return view('stock-producto.index', compact('stockProductos'))
            ->with('i', (request()->input('page', 1) - 1) * $stockProductos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stockProducto = new StockProducto();
        return view('stock-producto.create', compact('stockProducto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(StockProducto::$rules);

        $stockProducto = StockProducto::create($request->all());

        return redirect()->route('stock-productos.index')
            ->with('success', 'StockProducto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stockProducto = StockProducto::find($id);

        return view('stock-producto.show', compact('stockProducto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stockProducto = StockProducto::find($id);

        return view('stock-producto.edit', compact('stockProducto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  StockProducto $stockProducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StockProducto $stockProducto)
    {
        request()->validate(StockProducto::$rules);

        $stockProducto->update($request->all());

        return redirect()->route('stock-productos.index')
            ->with('success', 'StockProducto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $stockProducto = StockProducto::find($id)->delete();

        return redirect()->route('stock-productos.index')
            ->with('success', 'StockProducto deleted successfully');
    }
}
