<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\DetalleVentaServicio;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class VentaController
 * @package App\Http\Controllers
 */
class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::with('cliente')->get();

        return view('venta.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::all();
        $productos = Producto::all();
        $servicios = Servicio::all();

        return view('venta.create',[
            'clientes' => $clientes,
            'productos' => $productos,
            'servicios' => $servicios
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
        $fields = $request->validate([
            'id_cliente' => 'numeric|required|exists:clientes,id',
            'tipo_entrega' => 'numeric|in:1,2|required',
            'fecha_entrega' => 'required|date|after_or_equal:today',
            'detalleServicio' => 'required_without:detalleProducto|array',
            'detalleProducto' => 'required_without:detalleServicio|array',
            'detalleServicio.*.id' => 'required|numeric|exists:servicios,id',
            'detalleServicio.*.cantidad' => 'required|numeric|min:1',
            'detalleServicio.*.subtotal' => 'required|numeric|min:1',
            'detalleProducto.*.id' => 'required|numeric|exists:productos,id',
            'detalleProducto.*.cantidad' => 'required|numeric|min:1',
            'detalleProducto.*.subtotal' => 'required|numeric|min:1',
        ]);

        
        $venta_total = 0;
        $detalle_servicios = [];
        $detalle_productos = [];

        foreach ($fields['detalleServicio'] as $detalle) {
            $venta_total += $detalle['subtotal'];
            array_push($detalle_servicios,[
                'id_servicio' => $detalle['id'],
                'subtotal' => $detalle['subtotal'],
                'cantidad' => $detalle['cantidad']
            ]);
        }

        foreach ($fields['detalleProducto'] as $detalle) {
            $venta_total += $detalle['subtotal'];
            array_push($detalle_productos,[
                'id_producto' => $detalle['id'],
                'subtotal' => $detalle['subtotal'],
                'cantidad' => $detalle['cantidad']
            ]);
        }



        $venta = Venta::create([
            'codigo' => Str::random(8),
            'id_cliente' => $fields['id_cliente'],
            'id_estado' => 1,
            'costo_total' => $venta_total,
            'tipo_entrega' => $fields['tipo_entrega'],
            'fecha_entrega' => $fields['fecha_entrega']
        ]);

        $venta->detalleProducto()->createMany($detalle_productos);
        $venta->detalleServicio()->createMany($detalle_servicios);

        return response()->json([
            'message' => 'venta creada con exito'
        ]);

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = Venta::where('id',$id)->with('detalleProducto','detalleProducto.producto','detalleServicio','detalleServicio.servicio')->first();

        return view('venta.show', compact('venta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venta = Venta::find($id);

        return view('venta.edit', compact('venta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Venta $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        $fields = $request->validate([
            'id_estado' => 'numeric|required|min:1|max:5'
        ]);

        $venta->update($fields);

        return redirect()->route('ventas.index')
            ->with('success', 'Venta updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $venta = Venta::find($id)->delete();

        return redirect()->route('ventas.index')
            ->with('success', 'La venta fue retirada de nuestros registros');
    }
}
