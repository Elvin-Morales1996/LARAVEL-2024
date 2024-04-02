@extends('layouts.plantilla')

@section('title','home')
    

@section('content')
<h1>bienvenido a la pagina para crear un curso</h1>



<form action="{{route('curso.store')}}" method="POST">
    <!-- csrf: es un token que sirve medida de seguridad
    debe dentro del formulario-->
    @csrf
    <label>
        nombre: 
        <input type="text" name="nombre" value="{{old('nombre')}}">
    </label>

    @error('nombre')
        {{$message}}
    @enderror
    <br><br>

    <label>
        descripcion: 
        <textarea name="descripcion"   rows="10">{{old('descripcion')}}</textarea>
    </label>
    @error('descripcion')
    {{$message}}
    @enderror
    <br><br>
    <label>
        categoria: 
        <input type="text" name="categoria" value="{{old('categoria')}}">
    </label>
    @error('categoria')
        {{$message}}
    @enderror
    <br><br>

<button type="submit">enviar datos</button>


</form>
@endsection