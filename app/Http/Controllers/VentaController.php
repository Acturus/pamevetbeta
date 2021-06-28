<?php

namespace App\Http\Controllers;

use App\Mail\ChangeVentaMail;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Servicio;
use App\Models\Venta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
            'tipo_entrega' => 'numeric|in:1,2,3|required',
            'direccion' => 'string|nullable',
            'fecha_entrega' => 'required|date|after_or_equal:today',
            'detalleProducto' => 'required_without:detalleServicio|array',
            'detalleProducto.*.id' => 'required|numeric|exists:productos,id',
            'detalleProducto.*.cantidad' => 'required|numeric|min:1',
            'detalleProducto.*.subtotal' => 'required|numeric|min:1'
        ]);

        $venta_total = 0;
        $detalle_productos = [];

        foreach ($fields['detalleProducto'] as $detalle) {
            $venta_total += $detalle['subtotal'];
            array_push($detalle_productos,[
                'id_producto' => $detalle['id'],
                'subtotal' => $detalle['subtotal'],
                'cantidad' => $detalle['cantidad']
            ]);
        }

        $datos_cliente = DB::table('clientes')->select('direccion', 'correo')->where('id', $fields['id_cliente'])->first();

        $direccion = $fields['direccion'] ?? ($fields['tipo_entrega'] == '1' ? 'Av. Aramburú 123, Urb. Jesús Obrero, Surco' : $datos_cliente->direccion);
        $tudey = Carbon::now()->format('d/m/Y h:i A');
        $codigo_ped = Str::random(8);

        $venta = Venta::create([
            'codigo' => $codigo_ped,
            'id_cliente' => $fields['id_cliente'],
            'id_estado' => 1,
            'direccion' => $direccion,
            'costo_total' => $venta_total,
            'tipo_entrega' => $fields['tipo_entrega'],
            'fecha_entrega' => $fields['fecha_entrega']
        ]);

        $venta->detalleProducto()->createMany($detalle_productos);

        Mail::to($datos_cliente->correo)->send(new ChangeVentaMail($venta_total, $direccion, $codigo_ped, $tudey, $fields['detalleProducto']));

        return response()->json([
            'message' => 'Venta creada con éxito'
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
        $venta = Venta::where('id',$id)->with('detalleProducto','detalleProducto.producto')->first();

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
            'id_estado' => 'numeric|required|min:1|max:5',
            'hora_entrega'=>'date_format:H:i|nullable',
            'motivo_anulacion'=>'string|nullable|min:5|max:300'
        ]);

        $venta->update($fields);

        return redirect()->route('ventas.index')
            ->with('success', 'El tracking fue actualizado');
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
