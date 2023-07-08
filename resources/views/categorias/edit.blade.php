@extends('layouts.app')
@section('content')
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Formulario editar</h5>
        <a href="{{route('categorias.index')}}" class="btn btn-primary ml-auto">
            <i class="fas fa-arrow-left"> </i>
            Volver
        </a>
    </div>
</div>
<div class="card-body">
    <form action="{{route('categorias.update', $categoria->idCategoria)}}" method="POST" enctype="multipart/form-data" id="create">
    @method('PUT')
    @include('categorias.partials.form')
    </form>
</div>
<div class="card-footer">
    <button class="btn btn-warning" form="create">
        <i class="fas fa-pencil-alt"></i>
        Editar
    </button>
</div>
@endsection