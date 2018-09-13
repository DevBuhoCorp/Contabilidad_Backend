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
        /*$diarios = DB::select('CALL Sel_DiarioContable (?,?);',[$id->input('opt'),$id->input('id')]);
        return $diarios;*/
        
       /* $diarios = DB::table(DB::raw('diariocontable d, naturaleza n')) 
        -> select(DB::raw('d.ID,d.Codigo,d.Etiqueta,n.Etiqueta as Naturaleza,d.Estado,n.ID as IDNaturaleza'))
        -> where('d.IDNaturaleza', '=', 'n.ID')
        ->paginate(3);*/

        $diarios = DB::table('diariocontable')
            ->join('naturaleza','diariocontable.IDNaturaleza','=', 'naturaleza.ID')
            ->select(DB::raw('diariocontable.ID,diariocontable.Codigo,diariocontable.Etiqueta,diariocontable.Etiqueta as Naturaleza,diariocontable.Estado,naturaleza.ID as IDNaturaleza'))
            ->paginate(3);
        return Response($diarios, 200);





        //return $diarios;

        /*$diarios = DB::table('diariocontable')->paginate(3);
        return json_encode($diarios);*/
      

        /*$diarios = DiarioContable::paginate(3);
        return json_encode($diarios);*/
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
        $array [] = json_encode($request->all());
        $diarios = DB::insert('CALL Ins_DiarioContable (?)',$array);
        return json_encode($diarios);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $array [] = json_encode($request->all());
        $diarios = DB::update('CALL Upd_DiarioContable (?)',$array);
        return json_encode($diarios);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diarios = DB::delete('CALL Del_DiarioContable (?)',[$id]);
        return json_encode($diarios);
    }
}
