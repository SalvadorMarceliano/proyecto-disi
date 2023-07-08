@extends('layouts.app')
@section('content')
<div class="card-mt-3">
<div class="row">
                    <div class="col-4">
                        <div class="form-group">
                            <a class="navbar-brand">Buscar</a>
                            <input class="form-control mr-sm-2" type="search" id="search" placeholder="Search" aria-label="Search"
                            value="{{ (isset($_GET['search']))?$_GET['search']:'' }}">  
                        </div>
                </div>    
                        <div class="col-8">
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
                    <div>
                    @if($facturas->total() > 5)
                    {{$facturas->links()}}
                    @endif
                </div>
    </div>
    <div class ="col-9"> 
        <h1>Facturas</h1>
    <a href="{{route('home')}}" class="btn btn-primary">
        Volver
    </a>
    <a href="{{route('facturas.create')}}" class="btn btn-primary">
    Crear factura </a>
</div >
</div>
<div class="card-body">
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col"> id</th>
        <th scope="col"> rfc</th>
        <th scope="col"> razon Social</th>
        <th scope="col"> producto</th>
        <th scope="col"> total </th> 
        <th scope="col"> IVA</th>
        <th> acciones </th>
        </tr>
    </thead>
    <tbody>
        @foreach($facturas as $factura)
        <tr>
            <th scope="row">{{$factura->idfactura}}</th>
            <td>{{$factura->rfc}}</td>
            <td width="40%">{{$factura->razonSocial}}</td>
            <td>{{$factura->idventa}}{{$factura->venta->producto->nombre}}</td>
            <td>{{$factura->venta->total}}</td>
            <td>{{$factura->iva}}</td>
            <td>
            <a href="{{route('facturas.show',$factura->idfactura)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
            <a href="{{route('facturas.edit',$factura->idfactura)}}" class="btn btn-success"><i class="fas fa-file"></i></a>
            <button type="submit" class="btn btn-danger"
                                        form="delete_{{$factura->idfactura}}"
                                        onclick="return confirm('¿Estás seguro de eliminar el registro?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <form action="{{route('facturas.destroy', $factura->idfactura)}}"
                                        id="delete_{{$factura->idfactura}}" method="post" enctype="multipart/form-data"
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
<div class="card-foother" >
@if($facturas->total() > 10)
    {{$facturas->links()}}
    @endif
</div>
@endsection

@section('scripts')
<script type="text/javascript">

    $('#limit').on('change',function(){
        window.location.href = '{{ route('facturas.index') }}?limit='+$(this).val()+'&search='+$('#search').val()
    })

    $('#search').on('keyup',function(e){
        if(e.keyCode== 13){
            window.location.href = '{{ route('facturas.index') }}?limit='+$('#limit').val()+'&search='+$(this).val()
        }
    })
</script>
@endsection