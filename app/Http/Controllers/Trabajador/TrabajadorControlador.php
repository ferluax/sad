<?php

namespace App\Http\Controllers\Trabajador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Servicios;

// para actualizar imagenes 
use Illuminate\Support\Facades\Storage;

class TrabajadorControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['servicios']=Servicios::where('user_id', Auth::id())->get();
        return view('trabajador.servicios.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('trabajador.servicios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|min:3|max:255',
            'categoria' => 'required',
            'descripcion' => 'required|min:3|max:255',
            'imagen' => 'required|max:10000|mimes:jpeg,png,jpg'
        ]);

        $request->merge(['user_id' => Auth::id()]);
        //$datosArticulo = request()->all();
        $datosServicio = request()->except('_token');

        if($request->hasFile('imagen')){
            $datosServicio['imagen']=$request->file('imagen')->store('uploads', 'public');
        }

        Servicios::insert($datosServicio);

        // return response()->json($datosServicio);
        return redirect('trabajador/servicios')->with('mensaje', 'Registro exitoso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Vamos a recuperar los datos
        $servicios = Servicios::findOrFail($id);

        return view('trabajador.servicios.edit', compact('servicios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datosServicio = request()->except(['_token','_method']);

        if($request->hasFile('imagen')){

            //Vamos a recuperar los datos
            $servicios = Servicios::findOrFail($id);

            // aqui se eliminara la foto que esta actualmente para que tu puedas agregar la nueva
            Storage::delete(['public/'.$servicios->imagen]);

            $datosServicio['imagen']=$request->file('imagen')->store('uploads', 'public');
        }

        //se actualizan los datos en la base de datos
        Servicios::where('id','=',$id)->update($datosServicio);

        //Vamos a recuperar los datos
        $servicios = Servicios::findOrFail($id);

        return view('trabajador.servicios.edit', compact('servicios'))->with('mensaje', 'Registro modificado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        // recuperamos los datos para poder eliminar la imagen y registro
        $servicios = Servicios::findOrFail($id);

        //aqui se elimina la foto y el registro
        if(Storage::delete('public/'.$servicios->imagen)){
            Servicios::destroy($id);
        }

        return redirect('trabajador/servicios')->with('mensaje', 'Registro eliminado exitosamente!');
    }
}
