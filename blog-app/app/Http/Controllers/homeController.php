<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    //se ponen los metodos ya definido en larave
    public function __invoke(){
        return "hola soy manipulado por el controlador";
    }

}
