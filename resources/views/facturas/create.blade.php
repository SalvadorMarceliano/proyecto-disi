@extends('layouts.app')
@section('content')
<div class="card-mt-3"> 
<h5> Formulario crear</h5>
    <a href="{{route('facturas.index')}}" class="btn btn-primary">
    <i class="fa-sharp fa-light fa-pen"></i>Volver </a>
</div>
<div class="card-body">
    <form action="{{route('facturas.store')}}" method="POST" enctype="multipart/form-data" id="create">
        @include('facturas.partials.form')

    </form>    

</div>
<div class="card-foother"> 
<button class="btn btn-primary" form="create">
    Crear
</button>
</div>
@endsection