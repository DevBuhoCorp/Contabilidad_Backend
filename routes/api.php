<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiresource('diarios','DiarioContableController'); 
Route::apiresource('naturaleza','NaturalezaController'); 
Route::apiresource('modeloplancontable','ModeloPlanContableController');    
Route::apiresource('prueba','TipoCuentaBancariaController');    
Route::apiresource('plancontable','PlanContableController');

// kbsg
Route::apiresource('plancontable','EmpresaController');
Route::apiresource('plancontable','AplicacionController');

