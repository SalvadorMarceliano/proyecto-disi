@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{(isset($cliente))?$cliente->nombre:old('nombre')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Apellido Paterno</label>
            <input type="text" class="form-control" name="apellidoPaterno" value="{{(isset($cliente))?$cliente->apellidoPaterno:old('apellidoPaterno')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Apellido Materno</label>
            <input type="text" class="form-control" name="apellidoMaterno" value="{{(isset($cliente))?$cliente->apellidoMaterno:old('apellidoMaterno')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">RFC</label>
            <input type="text" class="form-control" name="rfc" value="{{(isset($cliente))?$cliente->rfc:old('rfc')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Telefono</label>
            <input type="tel" class="form-control" name="telefono" value="{{(isset($cliente))?$cliente->telefono:old('telefono')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Correo</label>
            <input type="email" class="form-control" name="correo" value="{{(isset($cliente))?$cliente->correo:old('correo')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Dirección</label>
            <input type="text" class="form-control" name="direccion" value="{{(isset($cliente))?$cliente->direccion:old('direccion')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Productos</label>
            <select class="form-control" name="idProducto">
                <option value="0">Seleccione una opcion</option>
                @foreach($productos as $producto)
                <option value="{{$producto->idProducto}}" @isset($cliente)
                {{($cliente->idProducto == $producto->idProducto)?'selected':""}}
                @endisset>{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>