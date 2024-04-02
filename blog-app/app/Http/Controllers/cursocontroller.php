<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;


class cursocontroller extends Controller
{
    //para agregar una vista se ultiliza view('nombre del archivo')
    public function index(){


        //para mostrar todos los registros de la tabla curso
        //se crea una variable y almacena el modelo 
        //paginate: es para mostrar cierta cantidad de registro pueden ser 15
        //orderBy('id','desc')->paginate(): sirve para mostrar los elementos de forma descendente
       $curso = Curso::orderBy('id','desc')->paginate();
        
        //compact('curso'): busca esa varibale con ese mismo nombre

    return view('cursos.index', compact('curso'));
   

    }
    
    //si la viata que quiero acceder esta dentro de una carpeta se pone por punto
    public function create(){
        return view('cursos.create');

    }
//este metodo sirve para almacenar los datos que vienen de un formulario 
//y enviar eso a una base de datos
//Request: obtener esa informacion 
// creamos una variable en la cual va almacenar todo lo que enviamos al formulario
    public function store(Request $rques){
    /* validar un formulario en esta funcion ya que se envian datos a la base de datos */
    /*validar datos en actualizar  
    validate: es un metodo que tiene lavarel validar campos vacios 
    se pone en un array donde van los nombres del fomulario*/
    $rques->validate([
        /* 'required|min:3'*/
        'nombre'=>['required','min:3'],
        'descripcion'=>'required',
        'categoria'=>'required'

    ]);

     /*creamos una instancia para que esta variable tenga acceso y poder almacenar
     los datos que vienen del formulario y se envie a la base datos */   
     $curso = new Curso();
     $curso->nombre = $rques->nombre;
     $curso->descripcion = $rques->descripcion;
     $curso->categoria = $rques->categoria;
     $curso->save();
//este return me retorna a una vista una vez creado el curso me manda a la vista de ese curso con
//con id
//redirect()->route('curso.show',$curso): me redirige a una vista
     return redirect()->route('curso.show',$curso);

    }

   //si un metodo llevara parametro se hace de esta forma 
   //modificacion hoy
    public function show($id){
        $curso = Curso::find($id);

        return view('cursos.show',compact('curso'));
    }

    /*funcion edit recibe como parametros una id 
    instanciamos la clase y me retorna una vista que se llama edit */
    public function edit(Curso $curso){
        //compact('curso'): es el nombre de la varibale que se crea en el parametro
        return view('cursos.edit',compact('curso'));

    }

        /* en esta funcion ya con los datos los traemos aqui recibe dos parametros 
        uno es Request $re que permite traer los datos 
        Curso $curso crear el objeto para poder subir esos datos a la base de datos*/
    public function update(Request $re ,Curso $curso){

        /*validar datos en actualizar  
        validate: es un metodo que tiene lavarel validar campos vacios 
        se pone en un array donde van los nombres del fomulario*/
        $re->validate([
            /* 'required|min:3'*/
            'nombre'=>['required'],
            'descripcion'=>'required',
            'categoria'=>'required'
    
        ]);


        $curso->nombre = $re->nombre;
        $curso->descripcion = $re->descripcion;
        $curso->categoria = $re->categoria;
        //subir a la base de datos
        $curso->save();
        //redirigirme a la pagina y mostrar esos datos ya actualizado
        return redirect()->route('curso.show',$curso);


    }


}
