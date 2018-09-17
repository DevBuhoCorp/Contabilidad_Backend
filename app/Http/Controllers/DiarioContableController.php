<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diariocontable;
use Illuminate\Support\Facades\DB;

class DiarioContableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $id)
    {
        $diarios = DB::table('diariocontable')
            ->join('naturaleza', 'diariocontable.IDNaturaleza', '=', 'naturaleza.ID')
            ->select(DB::raw('diariocontable.ID,diariocontable.Codigo,diariocontable.Etiqueta,diariocontable.Etiqueta as Naturaleza,diariocontable.Estado,naturaleza.ID as IDNaturaleza'))
            ->paginate($id->input('psize'));
        return Response($diarios, 200);
    }

    public function combo()
    {
        return response(DiarioContable::all(), 200);
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
        $diario = Diariocontable::create($request->all());
        $diario->Estado = $diario->Estado ? 'ACT' : 'INA';
        $diario->save();
        return Response($diario, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diarios = DB::table('diariocontable')
            ->join('naturaleza', 'diariocontable.IDNaturaleza', '=', 'naturaleza.ID')
            ->select(DB::raw('diariocontable.ID,diariocontable.Codigo,diariocontable.Etiqueta,diariocontable.Etiqueta as Naturaleza,diariocontable.Estado,naturaleza.ID as IDNaturaleza'))
            ->where('diariocontable.ID', '=', $id)
            ->get();
        return Response(json_encode($diarios), 200);
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
        $diarios = Diariocontable::find($id);
        $diarios->Codigo = $request->input('Codigo');
        $diarios->Etiqueta = $request->input('Etiqueta');
        $diarios->IDNaturaleza = $request->input('IDNaturaleza');
        $diarios->Estado = $request->input('Estado') ? 'ACT' : 'INA';
        $diarios->save();
        return Response($diarios, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diarios = Diariocontable::find($id);
        $diarios->Estado = 'INA';
        $diarios->save();
        return Response($diarios, 200);
    }
}
