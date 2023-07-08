@extends('layouts.app')
@section('content')
<div class="card-mt-3"> 
<h5> Formulario editar</h5>
    <a href="{{route('ventas.index')}}" class="btn btn-primary">
    <i class="fa-sharp fa-light fa-pen"></i>Volver </a>
<div>
<div class="card-body">
    <form action="{{route('ventas.update',$venta->idVenta)}}" method="POST" enctype="multipart/form-data" id="Update">
        @method('PUT')
        @include('ventas.partials.form')
    </form>    

</div>
<div class="card-foother" >
<button class="btn btn-primary" form="Update">
    Actualizar 
</button>
</div>
@endsection