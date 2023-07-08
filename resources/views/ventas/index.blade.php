@extends('layouts.app')
@section('content')

<div class="card mt-3">
    <div>
        <h2>Ventas</h2>
        <a href="{{route ('ventas.create')}}" class="btn btn-primary" <i class="fa-solid fa-plus"></i> Agregar </a>
        
        <!--<a href="{{--route ('ventas.pdf')--}}" class="btn btn-primary" <i class="fa-solid fa-file-pdf"></i>Exportar PDF</a>-->
    </div>
</div>
<div class="card-body"> 
    <!-- Search -->
    <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <a class="navbar-brand">Listar</a>
                        <select class="custom-select" id="limit" name="limit">
                            @foreach([10,20,50,100] as $limit)
                            <option value="{{$limit}}" @if(isset($_GET['limit']))
                                {{($_GET['limit']==$limit)?'selected': ''}}@endif>{{$limit}}</option>
                            @endforeach
                        </select>      
                    </div>
                </div>
                <div class="col-8">
                    <div class="form-group">
                        <a class="navbar-brand">Buscar</a>
                        <input class="form-control mr-sm-2" type="search" id="search" placeholder="Search" aria-label="Search"
                        value="{{ (isset($_GET['search']))?$_GET['search']:'' }}">  
                    </div>
                </div>
                @if($ventas->total() > 10)
                {{$ventas->links()}}
                @endif
            </div>
    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Fecha</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Total</th>
                <th scope="col">Producto</th>
                <th scope="col">Acciones</th>
            </tr>
    </thead>
    <tbody>
        @foreach($ventas as $venta)
        <tr>
            <th scope="row">{{$venta->idVenta}}</th>
            <td>{{$venta->fecha}}</td>
            <td>{{$venta->cantidad}}</td>
            <td>{{$venta->total}}</td>
            <td>{{$venta->idProducto}}-{{$venta->producto->nombre}}</td>
            <td></td>
            <td>
                <a href="{{ route('ventas.show', $venta->idVenta) }}" class="btn btn-primary">
                    <i class="fas fa-eye"></i></a> 
                <a href="{{ route('ventas.edit', $venta->idVenta) }}" class="btn btn-warning">
                    <i class="fas fa-pencil-alt"></i></a>
                
                    <button type="submit" class="btn btn-danger"
                                form="delete_{{$venta->idVenta}}"
                                onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                <i class="fas fa-trash"></i>
                                Eliminar
                            </button>
                        <form action="{{route('ventas.destroy', $venta->idVenta)}}"
                              id="delete_{{$venta->idVenta}}" method="post" enctype="multipart/form-data"
                              hidden>
                              @csrf
                              @method('DELETE')
                        </form>


            </td>
        </tr>
        @endforeach
  </tbody>
    </table>
    </div>
</div>
<div class="card-footer">
@if($ventas->total() > 10)
                    {{$ventas->links()}}
                    @endif
</div>

@endsection