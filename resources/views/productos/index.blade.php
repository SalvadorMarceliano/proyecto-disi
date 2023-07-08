@extends('layouts.app')
@section('content')

<div class="card mt-3">
    <div>
        <h2>Productos</h2>
        <a href="{{route ('productos.create')}}" class="btn btn-primary" <i class="fa-solid fa-plus"></i> Agregar </a>
        <!---->
        <a href="{{route ('productos.pdf')}}" class="btn btn-primary" <i class="fa-solid fa-file-pdf"></i>Exportar PDF</a>
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
                @if($productos->total() > 10)
                {{$productos->links()}}
                @endif
            </div>
    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
                <th scope="col">Expiracion</th>
                <th scope="col">Stock</th>
                <th scope="col">Acciones</th>
            </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
            <th scope="row">{{$producto->idProducto}}</th>
            <td>{{$producto->nombre}}</td>
            <td>{{$producto->descripcion}}</td>
            <td>{{$producto->precio}}</td>
            <td>{{$producto->expiracion}}</td>
            <td>{{$producto->stock}}</td>
            <td></td>
            <td>
                <a href="{{ route('productos.show', $producto->idProducto) }}" class="btn btn-primary">
                    <i class="fas fa-eye"></i></a> 
                <a href="{{ route('productos.edit', $producto->idProducto) }}" class="btn btn-warning">
                    <i class="fas fa-pencil-alt"></i></a>
                
                    <button type="submit" class="btn btn-danger"
                                form="delete_{{$producto->idProducto}}"
                                onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                <i class="fas fa-trash"></i>
                                Eliminar
                            </button>
                        <form action="{{route('productos.destroy', $producto->idProducto)}}"
                              id="delete_{{$producto->idProducto}}" method="post" enctype="multipart/form-data"
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
@if($productos->total() > 10)
                    {{$productos->links()}}
                    @endif
</div>

@endsection

<!-- VA EN EL INDEX AL FINAL -->
@section('scripts')
<script type="text/javascript">

    $('#limit').on('change',function(){
        window.location.href = '{{ route('productos.index') }}?limit='+$(this).val()+'&search='+$('#search').val()
    })

    $('#search').on('keyup',function(e){
        if(e.keyCode== 13){
            window.location.href = '{{ route('productos.index') }}?limit='+$('#limit').val()+'&search='+$(this).val()
        }
    })
</script>
@endsection