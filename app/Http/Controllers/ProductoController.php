<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        return view('producto.create', compact('producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Producto::$rules);

        $images = "";

        foreach ($request->file('fotos') as $file ) {
            $path = $file->store('public/productos');
            $image = str_replace('public/','storage/',$path);
            $images .= "$image,";
        }

        $newProduct = $request->except('fotos');
        $newProduct['fotos'] = substr($images,0,-1); 

        Producto::create($newProduct);

        return redirect()->route('productos.index')
            ->with('success', 'Se creó el producto correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);

        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        request()->validate(Producto::$updrules);
        $images = "";

        if($request->hasFile('fotos')){
            foreach ($request->file('fotos') as $file ) {
                $path = $file->store('public/productos');
                $image = str_replace('public/','storage/',$path);
                $images .= "$image,";
            }

            $newProduct = $request->except('fotos');
            $newProduct['fotos'] = substr($images,0,-1); 
            $producto->update($newProduct);
        }
        else{
            $producto->update($request->all());
        }

        return redirect()->route('productos.index')
            ->with('success', 'Se actualizaron los datos correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'El Producto se eliminó correctamente');
    }
}
