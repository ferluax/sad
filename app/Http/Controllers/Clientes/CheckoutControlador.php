<?php

namespace App\Http\Controllers\Clientes;

use App\Http\Controllers\Controller;
use App\Mail\Notificar;
use App\Mail\NotificarTrabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Servicios;
use App\Models\Checkout;
use Barryvdh\DomPDF\PDF;

class CheckoutControlador extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('cliente.checkout.index');
        $datos['check']=Checkout::where('user_id', Auth::id())->get();
        return view('cliente.checkout.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $request->merge(['user_id' => Auth::id()]);
        $datosServicio = request()->except('_token');

        Checkout::insert($datosServicio);
        return redirect('cliente/checkout');
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
        $data= Checkout::find($id);
        return view('cliente.checkout.pago',['check'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    public function correo(Checkout $check)
    {
        Mail::to($check->user->email)->to($check->servicios_email)->send(new NotificarTrabajador($check));
        // return redirect()->route('cliente.paginas.recibos');
        return redirect('cliente/recibos');
    }

    public function recibos()
    {
        // return view('cliente.checkout.recibos');
        $datos['check']=Checkout::where('user_id', Auth::id())->get();
        return view('cliente.checkout.recibos', $datos);
    }

    public function pdf($id)
    {
        $data= Checkout::find($id);
        $pdf = app('dompdf.wrapper');
    $pdf->loadView('pdf.recibo', array( 'check' => $data));

        return $pdf->stream();
    }

}
