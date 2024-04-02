<?php

use Illuminate\Support\Facades\Route;


/* para poder utilizar un controlador en la ruta se debe poner extension*/
use App\Http\Controllers\homeController;

/*segundo controlador */
use App\Http\Controllers\cursocontroller;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('/', homeController::class);

/*grupo de rutas de un controlador
para que se vea mas limpio*/
Route::controller(cursocontroller::class)->group(function(){
    /*se le pone nombre a las rutas asi cuando modifiquen las rutas no afecte el nombre */
    Route::get('cursos','index')->name('curso.index');
    Route::get('cursos/create','create')->name('curso.create');
    //se crea la ruta post: que es enviar los datos de forma segura.
    //store: almacena los datos y enviar a la base de datos
    Route::post('cursos','store')->name('curso.store');
    //modificacion hoy
    Route::get('cursos/{id}','show')->name('curso.show');


    /*esta ruta me sirve para poder editar y mandar al controlador 
    recibe como parametro una id o bien poner la variable curso que es practicamente lo mismo*/
    Route::get('cursos/{curso}/edit','edit')->name('curso.edit');



    /*en el formulario edit esta la ruta y aqui creamos la ruta con el metodo
    put que es para modicar los valores y recibe el id o en este caso la variable curso */
    Route::put('cursos/{curso}','update')->name('curso.update');


});


















