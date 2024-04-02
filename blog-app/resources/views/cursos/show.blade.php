@extends('layouts.plantilla')

@section('title','curso '. $curso->nombre)
    

@section('content')
{{--modificacion aqui --}}

<h1>bienvenido al curso:  {{$curso->nombre}}</h1>
<a href="{{route('curso.index')}}">regresar a pagina principal</a>
<br><br>

<a href="{{route('curso.edit', $curso)}}">editar este curso</a>

<p>categoria: <strong>{{$curso->categoria}}</strong></p>
<p>descripcion: <strong>{{$curso->descripcion}}</strong></p>