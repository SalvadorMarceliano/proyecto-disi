@csrf
<div class="container">
<lavel> datos de compra</Lavel>
<div class="row">
        <div class="col-3"> <div form-group>
        <lavel for="">fecha</label>
        <input type="text" class="form-control" value="{{(isset($venta))?$venta->fecha:old('fecha')}}" required>
        </div>
        </div>
        <div class="col-3"> <div form-group>
        <lavel for=""> venta</label>
        <input type="text" id="cantidad" class="form-control"  value="{{(isset($venta))?$venta->cantidad:old('cantidad')}}" required>
        </div>
        </div>
        <div class="col-3"> <div form-group>
        <lavel for="">costo</label>
        <input type="text" class="form-control"  value="{{(isset($venta))?$venta->total:old('total')}}" required>
        </div>
        </div>
</div>     
<div class="row">

    <lavel> Ficha de producto</Lavel>
     <div class="col-4"> <div form-group>
        <lavel for="">Nombre</label>
        <input type="text" class="form-control" name="nombre" value="{{(isset($venta))?$venta->producto->nombre:old('nombre')}}" required>
    </div>
        </div>
    <div class="col-2"> <div form-group>
        <lavel for="">precio</label>
        <input type="text" class="form-control" name="precio" value="{{(isset($venta))?$venta->producto->precio:old('precio')}}" required>
    </div>
    </div>
    <div class="col-2"> <div form-group>
        <lavel for="">fecha de expiracion</label>
        <input type="text" class="form-control" name="expiracion" value="{{(isset($venta))?$venta->producto->expiracion:old('expiracion')}}" required>
    </div>
        </div>   
</div>
<div class="row">
    <div class="col-3"> <div form-group>
        <lavel for="">stoko neto</label>
        <input type="text" class="form-control" id="stok" value="{{(isset($venta))?$venta->producto->stock:old('stock')}}" required>
    </div>
        </div>
        <div class="col-3"> <div form-group>
        <lavel for="">stock final</label>
        <input type="text"id="St" class="form-control" name="stock"srequired>
    </div>
        </div>
<div class="row">
   <div class="col-12"> <div form-group>
    <lavel for="">descripcion</label>
        <input type="text"  class="form-control" name="descripcion" value="{{(isset($venta))?$venta->producto->descripcion:old('descripcion')}}" required>
    </div>
        </div>
<div>