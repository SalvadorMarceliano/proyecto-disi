@csrf
<div class="container">
    <div class="row">
    <div class="col-2"> <div form-group>
            <lavel for="">Fecha</label>
            <input id="fecha" type="date" class="form-control" name="fecha" value="{{(isset($venta))?$venta->feacha:old('feacha')}}" required>
        </div>
            </div>
    <div class="col-4">
    <div class="form-group">
        <label for="">Producto</label>
        <select type="number" class="form-control" name="idProducto" onchange="recuperarPrecio(),calcular()">
        @foreach($productos as $producto)
        <option value="{{$producto->idProducto}}" @isset($ventas)
            {{ ($ventas->idProducto == $producto->idProducto)?'selected':''}}
            @endisset>{{$producto->nombre}} Precio:{{$producto->precio}} Stok:{{$producto->stock}}</option>
        @endforeach
        </select>
    </div>
    </div>
</div>
<div class="row">
    <input type="hidden" name="precio" id="precio">
  
        <div class="col-4"> <div form-group>
            <lavel for="">Cantidad</label>
            <input id="cantidad" type="decimal" class="form-control" name="cantidad" value="{{(isset($venta))?$venta->cantidad:old('cantidad')}}" oninput="calcular()" required>
        </div>
            </div>
 
        <div class="col-4"> <div form-group>
            <lavel for="resultado">Total</label>
            <input type="text" class="form-control" name="total" value="{{(isset($venta))?$venta->total:old('total')}}" id="resultado"onchange="calcular()" required>
        </div>
            </div> 
</div>   
</div>       