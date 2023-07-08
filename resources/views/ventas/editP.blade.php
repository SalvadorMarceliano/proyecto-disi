@extends('layouts.app')
@section('content')
<div class="card-mt-3"> 
<h5> Formulario editar</h5>
    <a href="{{route('productos.index')}}" class="btn btn-prmary">
    <i class="fa-sharp fa-light fa-pen"></i>Volver </a>
<div>
<div class="card-body">
    <form action="{{route('productos.update',$venta->idProducto)}}" method="POST" enctype="multipart/form-data" id="Update">
        @method('PUT')
        @include('ventas.partials.formP')
    </form>    

</div>
<div class="card-foother">
<button class="btn btn-prmary" form="Update">
    actualisar 
</button>
</div>
@endsection