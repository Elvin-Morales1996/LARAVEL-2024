
@extends('layouts.plantilla')

@section('title','index')
    

@section('content')
<h1>bienvenido a la pagina principal del curso</h1>

{{--{{route('curso.create')}}: es para poner una ruta especifica --}}
<a href="{{route('curso.create')}}">crear nuevo curso</a>

<ul>
    {{--foreach: me sirve para mostrar todos los datos que existan esa base de datos
        $curso viene del modelo de la clase que se creo en el controlador--}}
        @foreach ($curso as $col)
        <li>
           <a href="{{route('curso.show',$col->id)}}">{{$col->nombre}}</a>
        </li>
        @endforeach
    
</ul>
{{-- $curso->links(): sirve para ir a la siguente pagina siguiente --}}
{{$curso->links()}}





@endsection






