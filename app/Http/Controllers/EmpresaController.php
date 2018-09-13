<?php

namespace App\Http\Controllers;

use App\Models\Diariocontable;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = DB::table(diariocontable)
            ->join('naturaleza','diariocontable.IDNaturaleza','=', 'naturaleza.ID')
            ->select(DB::raw('diariocontable.Etiqueta, IDNaturaleza, naturaleza.Etiqueta as naturaleza'))
            ->paginate(3);
        return Response($response, 200);

//        $op = json_encode(array( "op" => "ALL"));
//        $diarios = DB::select('CALL Sel_Empresa (?);', [ $op ]);
//        return Response($diarios, 200) ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function listParams(Request $request)
    {
//        $op = json_encode(array( "op" => "ALL"));
        $op = json_encode($request->all());
        $empresas = DB::select('CALL Sel_Empresa (?);', [$op]);
        return Response($empresas, 200);
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
        $empresa = Empresa::create($request->all());
        $empresa->Estado = $empresa->Estado ? 'ACT' : 'INA';
        $empresa->save();
        return Response($empresa, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $empresa = Empresa::find($id);
        return Response($empresa, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Response([], 200);
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
        $empresa = Empresa::find($id);
        $empresa->Estado = $request->input('Estado') ? 'ACT' : 'INA';
        $empresa->Observacion = $request->input('Observacion');
        $empresa->Descripcion = $request->input('Descripcion');
        $empresa->save();
        return Response($empresa, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::find($id);
        $empresa->Estado = 'INA';
        $empresa->save();
        return Response($empresa, 200);
    }
}
