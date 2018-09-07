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
        $diarios = DB::select('CALL Sel_DiarioContable (?,?);',[$id->input('opt'),$id->input('id')]);
        return json_encode($diarios);
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
