@extends('layouts.app')
@section('content')
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Formulario ver productos id: {{$producto->idProducto}}</h5>
        <a href="{{route('productos.index')}}" class="btn btn-primary ml-auto">
            <i class="fas fa-arrow-left"> </i>
            Volver
        </a>
    </div>
</div>
<div class="card-body">
    <form action="{{route('productos.store', $producto->idProducto)}}" method="POST" enctype="multipart/form-data" id="create">
    @include('productos.partials.form')
    </form>
</div>
<div class="card-footer">
</div>
@endsection