@extends('layouts.app')
@section('content')
<div class="card mt-3">
    <div class="card-header d-inline-flex">
        <h5>Formulario ver productos id: {{$cliente->idCliente}}</h5>
        <a href="{{route('clientes.index')}}" class="btn btn-primary ml-auto">
            <i class="fas fa-arrow-left"> </i>
            Volver
        </a>
    </div>
</div>
<div class="card-body">
    <form action="{{route('clientes.store', $cliente->idCliente)}}" method="POST" enctype="multipart/form-data" id="create">
    @include('clientes.partials.form')
    </form>
</div>
<div class="card-footer">
</div>
@endsection