@extends('layouts.app')
@section('content')
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Formulario editar</h5>
        <a href="{{route('productos.index')}}" class="btn btn-primary ml-auto">
            <i class="fas fa-arrow-left"> </i>
            Volver
        </a>
    </div>
</div>
<div class="card-body">
    <form action="{{route('productos.update', $producto->idProducto)}}" method="POST" enctype="multipart/form-data" id="create">
    @method('PUT')
    @include('productos.partials.form')
    </form>
</div>
<div class="card-footer">
    <button class="btn btn-primary" form="create">
        <i class="fas fa-pencil-alt"></i>
        Editar
    </button>
</div>
@endsection