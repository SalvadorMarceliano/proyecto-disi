@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="">Fecha</label>
            <input type="date" class="form-control" name="fecha" value="{{(isset($venta))?$venta->fecha:old('fecha')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Cantidad</label>
            <input type="text" class="form-control" name="cantidad" value="{{(isset($venta))?$venta->cantidad:old('cantidad')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Total</label>
            <input type="number" class="form-control" name="total" value="{{(isset($venta))?$venta->total:old('total')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Producto</label>
            <select class="form-control" name="idProducto">
                <option value="0">Seleccione una opcion</option>
                @foreach($productos as $producto)
                <option value="{{$producto->idProducto}}" @isset($venta)
                {{($venta->idProducto == $producto->idProducto)?'selected':""}}
                @endisset>{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>