@extends('layouts.app')
@section('content')
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Formulario ver productos id: {{$categoria->idCategoria}}</h5>
        <a href="{{route('categorias.index')}}" class="btn btn-primary ml-auto">
            <i class="fas fa-arrow-left"> </i>
            Volver
        </a>
    </div>
</div>
<div class="card-body">
    <form action="{{route('categorias.store', $categoria->idCategoria)}}" method="POST" enctype="multipart/form-data" id="create">
    @include('categorias.partials.form')
    </form>
</div>
<div class="card-footer">
</div>
@endsection