<?php

namespace App\Http\Controllers;

use App\Models\Cuentacontable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Modeloplancontable;


class ModeloPlanContableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $id)
    {
       /* $modelopc = DB::select('CALL Sel_ModeloPlanContable (?,?);', [$id->input('opt'), $id->input('id')]);
        return json_encode($modelopc);*/
        $modelopc = new Modeloplancontable(); 
        return Response($modelopc->paginate($id->input('psize')),200);
    }

    public function combo(Request $id)
    {
        return Response(Modeloplancontable::all(),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return null;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* $array [] = json_encode($request->all());
        $modelopc = DB::insert('CALL Ins_ModeloPlanContable (?)',$array);
        return json_encode($modelopc);*/
        $modelopc = Modeloplancontable::create($request->all());
        $modelopc->Estado = $modelopc->Estado ? 'ACT' : 'INA';
        $modelopc->save();
        return Response($modelopc, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelopc = Modeloplancontable::find($id);
        return Response($modelopc, 200);
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
        /*$array [] = json_encode($request->all());
        $modelopc = DB::insert('CALL Ins_ModeloPlanContable (?)',$array);
        return json_encode($modelopc);*/
        $modelopc = Modeloplancontable::find($id);
        $modelopc->modelo = $request->input('Modelo');
        $modelopc->etiqueta = $request->input('Etiqueta');
        $modelopc->estado = $request->input('Estado');
        $modelopc->save();
        return Response( $modelopc , 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modelopc = Modeloplancontable::find($id);
        $modelopc->Estado = 'INA';
        $modelopc->save();
        return Response($modelopc, 200);

    }
}
