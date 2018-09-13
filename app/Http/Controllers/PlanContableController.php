<?php

namespace App\Http\Controllers;

use App\Models\Cuentacontable;
use App\Models\Modeloplancontable;
use App\Models\Plancontable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanContableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $id)
    {
        //$planc = DB::select('SELECT fn_PlanContable(0) data;');
        $planc = DB::select('SELECT fn_Sel_PlanContable(?,?) data;', [0, $id->input('id')]);
        return ($planc);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function numerocuenta(Request $request)
    {
        $planc = DB::select('call getNumCuenta(?,?)', [$request->input('opt'), $request->input('id')]);
        return json_encode($planc);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function apiPlanCuenta()
    {
        $modelo = new Modeloplancontable(["ID" => 6]);
//        $modelo->ID = 6;
//        $cuentasBruto = $modelo->cuentacontables()->get();
        $cuentasBruto = Cuentacontable::
                            join('plancontable','IDCuenta','=', 'cuentacontable.ID')
                            ->where('plancontable.IDModelo',6)
                            ->get(['cuentacontable.ID','Etiqueta','NumeroCuenta','cuentacontable.Estado','IDPadre']);

        $cuentasPadre = $cuentasBruto->where('IDPadre', null);
        $response = $this->to_tree($cuentasPadre, $cuentasBruto);

        return Response($response, 200);
    }

    public function to_tree($parents, $all)
    {
        $array = collect();
        foreach ($parents as $parent) {
            if ($all->contains('IDPadre', $parent["ID"])) {
                $parent["children"] = $this->to_tree($all->where('IDPadre', $parent["ID"]), $all);
            }
            $array->push($parent);
        }
        return $array;
    }
}