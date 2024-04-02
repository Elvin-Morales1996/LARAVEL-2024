@extends('layouts.plantilla')

@section('title','editar')
    

@section('content')
<h1>EDITAR UN CURSO</h1>
<!--en esta ruta se debe especificar nombre de la ruta, la variable del controlador "-->
<form action="{{route('curso.update',$curso)}}" method="POST">
    <!-- csrf: es un token que sirve medida de seguridad
    debe dentro del formulario-->
    @csrf
    <!--method('put'): sirve para que laravel que es un metodo para editar porque html es nativo
    y solo tiene post y get, y put es para editar -->
    @method('put')
    <label>
        nombre: 
        <!--value="$curso->nombre: trae el nombre de esa id "-->
        <input type="text" name="nombre" value="{{old('nombre',$curso->nombre)}}">
    </label>
    @error('nombre')
    {{$message}}
@enderror
    <br><br>
    <label>
        descripcion: 
        <!--value="$curso->descripcion: trae la descripcion de esa id para las cajas de texto se ponen asi"-->
        <textarea name="descripcion"   rows="10" >{{old('descripcion',$curso->descripcion) }}</textarea>
    </label>
    @error('descripcion')
    {{$message}}
    @enderror
    <br><br>

    <label>
        categoria: 
        <!--value="$curso->categoria: trae las categorias de esa id "-->
        <input type="text" name="categoria" value="{{old('categoria',$curso->categoria)}}">
    </label>
    @error('categoria')
    {{$message}}
    @enderror
    <br><br>

<button type="submit">actualizar datos</button>


</form>
@endsection