<?php

namespace App\Http\Controllers;

use App\Models\Aplicacion;
use App\Models\Empresaaplicacion;
use Illuminate\Http\Request;

class AplicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function listParams(Request $request)
    {
        $op = json_encode($request->all());
        $empresas = DB::select( 'CALL Sel_Aplicacion (?);', [ $op ] );
        return Response( $empresas, 200) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Response( [],200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $app = Aplicacion::create($request->all());
        $app->Estado = $app->Estado ? 'ACT' : 'INA';
        $app->save();

        $EmpApp = new Empresaaplicacion();
        $EmpApp->IDAplicacion = $app->ID;
        $EmpApp->IDEmpresa = $request->input("IDEmpresa");
        $EmpApp->save();
        return Response( $app,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $app = Aplicacion::find($id);
        return Response( $app ,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Response( [],200);
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
        $app = Aplicacion::find($id);
        $app->Estado = $request->input('Estado')? 'ACT' : 'INA';
        $app->Observacion = $request->input('Observacion');
        $app->Descripcion = $request->input('Descripcion');
        $app->save();
        return Response( $app ,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $app = Aplicacion::find($id);
        $app->Estado = 'INA';
        $app->save();
        return Response( $app,200);
    }
}
