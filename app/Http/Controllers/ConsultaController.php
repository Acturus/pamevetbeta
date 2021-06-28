<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Consulta;
use App\Models\Mascota;
use App\Models\Servicio;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

/**
 * Class ConsultaController
 * @package App\Http\Controllers
 */
class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultas = Consulta::with('mascota:id,nombre','cliente', 'servicio', 'user:id,nombres,apellidos')->get();

        return view('consulta.index', compact('consultas'));
    }

    public function programacion()
    {
        $consultas = Consulta::select('inicio', 'fin','id_usuario', 'id_servicio')->with('servicio:id,nombre', 'user:id,nombres,apellidos')->get();

        return view('consulta.programacion', compact('consultas'));
    }

    public function atencion()
    {
        $idusuario = auth()->user()->id;

        $consultas = Consulta::with('mascota:id,nombre','cliente', 'servicio')->where('id_usuario', $idusuario)->get();

        return view('consulta.atencion', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consulta = new Consulta();
        $clientes = Cliente::selectRaw("CONCAT (nombres, ' ', apellidos) as fullname, id")->get();
        $usuarios = User::selectRaw("CONCAT (nombres, ' ', apellidos) as fullname, id")->where('id_rol', 2)->get();
        $servicios = Servicio::select('id', 'nombre')->get();
        $mascotas = Mascota::select('id', 'nombre', 'id_cliente')->get();

        return view('consulta.create', compact('consulta', 'clientes', 'usuarios', 'mascotas', 'servicios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);

        request()->validate(Consulta::$rules);

        $data_servicio = Servicio::select('duracion_horas','duracion_minutos')->where('id', $request['id_servicio'])->first();

        $inicio = Carbon::createFromFormat('d/m/Y h:i a', $request['inicio'], 'America/Lima');
        $fin = $inicio->copy()->addHours($data_servicio->duracion_horas)->addMinutes($data_servicio->duracion_minutos);

        $newConsulta = $request->except(['inicio']);
        $newConsulta['inicio'] = date('Y-m-d H:i:s', $inicio->timestamp);
        $newConsulta['fin'] = date('Y-m-d H:i:s', $fin->timestamp);

        Consulta::create($newConsulta);

        return redirect()->route('consultas.index')
            ->with('success', 'La consulta ha sido registrada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta = Consulta::with('mascota:id,nombre','cliente', 'servicio', 'user:id,nombres,apellidos')->find($id);

        return view('consulta.show', compact('consulta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consulta = Consulta::find($id);
        $clientes = Cliente::selectRaw("CONCAT (nombres, ' ', apellidos) as fullname, id")->get();
        $usuarios = User::selectRaw("CONCAT (nombres, ' ', apellidos) as fullname, id")->where('id_rol', 2)->get();
        $servicios = Servicio::select('id', 'nombre')->get();
        $mascotas = Mascota::select('id', 'nombre', 'id_cliente')->get();

        return view('consulta.edit', compact('consulta', 'clientes', 'usuarios', 'mascotas', 'servicios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Consulta $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consulta $consulta)
    {
        $updrules = [
            'id_cliente' => 'nullable'
        ];

        request()->validate(array_replace(Consulta::$rules,$updrules));

        $data_servicio = Servicio::select('duracion_horas','duracion_minutos')->where('id', $request['id_servicio'])->first();

        $inicio = Carbon::createFromFormat('d/m/Y h:i a', $request['inicio'], 'America/Lima');
        $fin = $inicio->copy()->addHours($data_servicio->duracion_horas)->addMinutes($data_servicio->duracion_minutos);

        $newConsulta = $request->except(['inicio']);
        $newConsulta['inicio'] = date('Y-m-d H:i:s', $inicio->timestamp);
        $newConsulta['fin'] = date('Y-m-d H:i:s', $fin->timestamp);

        $consulta->update($newConsulta);

        return redirect()->route('consultas.index')
            ->with('success', 'La Consulta fue actualizada con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        Consulta::find($id)->delete();

        return redirect()->route('consultas.index')
            ->with('success', 'Se ha eliminado la consulta correctamente');
    }

    public function editDetail($id)
    {
        $consulta = Consulta::find($id);

        return view('consulta.editDetail', compact('consulta'));
    }

    public function saveDetail(Request $request, Consulta $consulta)
    {
        $rules = [
            'detalle' => 'string|required'
        ];

        $fields = $request->validate($rules);

        $consulta->update($fields);

        return redirect()->route('consultas.atencion')
            ->with('success', 'El detalle de la consulta se registró correctamente');
    }
}
