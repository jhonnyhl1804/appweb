<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Tipo_vehiculo;
use App\Models\Vehiculo;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('auth')->group(function () {

Route::get('tipo_vehiculo', function () {
    $tipovehiculos = Tipo_vehiculo::all();
    return view('tipo_vehiculo.index', compact('tipovehiculos'));
})->name('tipo_vehiculo.index');

Route::get('tipo_vehiculo/create', function(){
    return view('tipo_vehiculo.create');
})->name('tipo_vehiculo.create');

Route::post('tipo_vehiculo', function(Request $request){
    $newtipovehiculo = new Tipo_vehiculo;
    $newtipovehiculo->descripcion = $request->input('descripcion');
    $newtipovehiculo->save();

    return redirect()->route('tipo_vehiculo.index')->with('info','Registrado exitosamente');
})->name('tipo_vehiculo.store');

Route::delete('tipo_vehiculo/{id_tipo}', function($id_tipo){
    $tipo_vehiculo = Tipo_vehiculo::findOrFail($id_tipo);
    $tipo_vehiculo->delete();
    return redirect()->route('tipo_vehiculo.index')->with('info','Eliminado exitosamente');
})->name('tipo_vehiculo.destroy');

Route::get('Tipo_vehiculo/{id_tipo}/edit', function($id_tipo){
    $tipo_vehiculo = Tipo_vehiculo::findOrFail($id_tipo);
    return view('tipo_vehiculo.edit', compact('tipo_vehiculo'));
})->name('tipo_vehiculo.edit');

Route::put('/tipo_vehiculo/{id_tipo}', function(Request $request, $id_tipo){
   $tipo_vehiculo = Tipo_vehiculo::findOrFail($id_tipo);
   $tipo_vehiculo->descripcion = $request->input('descripcion');
   $tipo_vehiculo->save();
    
   return redirect()->route('tipo_vehiculo.index')->with('info','Editado exitosamente');
})->name('tipo_vehiculo.update');

//-----------VEHICULO-----------------------------------------

Route::get('vehiculo', function (){
    $vehiculos = Vehiculo::all();
    $tipovehiculos = Tipo_vehiculo::all();
    return view('vehiculo.index', compact('vehiculos'));

})->name('vehiculo.index');

Route::get('vehiculo/create', function(){

    return view('vehiculo.create');
})->name('vehiculo.create');

Route::post('vehiculo', function(Request $request){
    $newvehiculo = new Vehiculo;
    $newvehiculo->placa = $request->input('placa');
    $newvehiculo->color = $request->input('color');
    $newvehiculo->modelo = $request->input('modelo');

    $newvehiculo->save();

    return redirect()->route('vehiculo.index')->with('info','Registrado exitosamente');
})->name('vehiculo.store');

Route::delete('vehiculo/{id}', function($id){
    $vehiculo = Vehiculo::findOrFail($id);
    $vehiculo->delete();
    return redirect()->route('vehiculo.index')->with('info','Eliminado exitosamente');
})->name('vehiculo.destroy');


Route::get('vehiculo/{id}/edit', function($id){
    $vehiculo = Vehiculo::findOrFail($id);
    return view('vehiculo.edit', compact('vehiculo'));
})->name('vehiculo.edit');

Route::put('/vehiculo/{id}', function(Request $request, $id){
   $vehiculo = Vehiculo::findOrFail($id);
   $vehiculo->placa = $request->input('placa');
   $vehiculo->color = $request->input('color');
   $vehiculo->modelo = $request->input('modelo');
   $vehiculo->save();
    
   return redirect()->route('vehiculo.index')->with('info','Editado exitosamente');
})->name('vehiculo.update');

//---------------PRINCIPAL-------------------------------

Route::get('principal', function (){
    return view('principal.index');
})->name('principal.index');

});

Auth::routes();
