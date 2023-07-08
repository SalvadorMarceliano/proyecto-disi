@extends('layouts.app')
@section('content')

<div class="card mt-3">
    <div>
        <h2>Categorias</h2>
        <a href="{{route ('categorias.create')}}" class="btn btn-primary" <i class="fa-solid fa-plus"></i> Agregar </a>
        <a href="{{--route ('categorias.pdf')--}}" class="btn btn-info" <i class="fa-solid fa-file-pdf"></i> Exportar PDF </a>
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
                @if($categorias->total() > 10)
                {{$categorias->links()}}
                @endif
            </div>


    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Acciones</th>
            </tr>
    </thead>
    <tbody>
        @foreach($categorias as $categoria)
        <tr>
            <th scope="row">{{$categoria->idCategoria}}</th>
            <td>{{$categoria->Nombre}}</td>
            <td>{{$categoria->Descripcion}}</td>
            <td></td>
            <td>
                <a href="{{ route('categorias.show', $categoria->idCategoria) }}">
                    <i class="fas fa-eye"></i></a> 
                <a href="{{ route('categorias.edit', $categoria->idCategoria) }}">
                    <i class="fas fa-pencil-alt"></i></a>
                
                    <button type="submit" class="btn btn-danger"
                                form="delete_{{$categoria->idCategoria}}"
                                onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                <i class="fas fa-trash"></i>
                                Eliminar   
                            </button>
                        <form action="{{route('categorias.destroy', $categoria->idCategoria)}}"
                              id="delete_{{$categoria->idCategoria}}" method="post" enctype="multipart/form-data"
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
@if($categorias->total() > 10)
                    {{$clientes->links()}}
                    @endif
</div>

@endsection

@section('scripts')
<script type="text/javascript">

    $('#limit').on('change',function(){
        window.location.href = '{{ route('categorias.index') }}?limit='+$(this).val()+'&search='+$('#search').val()
    })

    $('#search').on('keyup',function(e){
        if(e.keyCode== 13){
            window.location.href = '{{ route('categorias.index') }}?limit='+$('#limit').val()+'&search='+$(this).val()
        }
    })
</script>
@endsection