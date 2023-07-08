@extends('layouts.app')
@section('content')
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Formulario de registro</h5>
        <a href="{{route('productos.index')}}" class="btn btn-primary">
            <i class="fas fa-arrow-left"> </i>
            Volver
        </a>
    </div>
</div>
<div class="card-body">
    <form action="{{route('productos.store')}}" method="POST" enctype="multipart/form-data"
    id="create">
    @include('productos.partials.form')
    </form>
</div>
<div class="card-footer">
    <button class="btn btn-primary" form="create">
        <i class="fas fa-plus"></i>
        Crear
    </button>
</div>
@endsection