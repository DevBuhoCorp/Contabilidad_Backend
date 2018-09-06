<?php

namespace App\Http\Controllers;

use App\Models\Cuentacontable;
use App\Models\Plancontable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CuentaContableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $id)
    {
        $cuenta = DB::select('CALL Sel_CuentaContable (?,?);',[$id->input('opt'),$id->input('id')]);
        return $cuenta;
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
        $cuenta = Cuentacontable::create($request->all());
        $cuenta->save();

        // Plan Contable
        $planC = new Plancontable;
        $planC->IDCuenta = $cuenta->ID;
        $planC->IDModelo = $request->input("IDPlanContable");
        $planC->ncuenta = 0;
        $planC->save();

        //
        $planC = Plancontable::where("IDModelo" ,$request->input("IDPlanContable"))->where("IDCuenta", $cuenta->IDPadre)->get()[0];
        $planC->ncuenta = $planC->ncuenta + 1;
        $planC->save();
        
        return Response( $cuenta,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cuenta = Cuentacontable::find($id);
        return $cuenta;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getNumCuenta($plancontable, $id)
    {
        $secuencia = DB::select('call getNumCuenta(?,?)', [ $id, $plancontable]);
        return $secuencia;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $cuenta = Cuentacontable::find($id);
        $cuenta->Etiqueta = $request->input('Etiqueta');
        $cuenta->Estado = $request->input('Estado');
        $cuenta->IDDiario = $request->input('IDDiario');
        $cuenta->save();
        return $cuenta;
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
}
