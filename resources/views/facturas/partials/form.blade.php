@csrf
<div class="container-md">
  <div class="col-12">
    <div class="form-group">
        <label for="">compra</label>
        <select type="number" class="form-control" name="idVenta" onchange="recuperarVenta()">
        @foreach($ventas as $venta)
        <option value="{{$venta->idVenta}}" @isset($facturas)
            {{ ($facturas->idVenta == $venta->idVenta)?'selected':''}}
            @endisset>{{$venta->producto->nombre}} total:{{$venta->total}}</option>
        @endforeach
        </select>
    </div>
    </div>

    <div class="col-12"> <div form-group>
        <lavel for="vent">total</label>
        <input id="vent" type="decimal" class="form-control" name="vent" value="{{old('vent')}}" required>
    </div>

    </div>
        <div class="col-12"> <div form-group>
        <lavel for="">RFC</label>
        <input type="text" class="form-control" name="rfc" value="{{(isset($factura))?$factura->rfc:old('rfc')}}" oninput="calcularIVA()"required>
    </div>

    <div class="col-12"> <div form-group>
        <lavel for="">razon Social</label>
        <input  type="decimal" class="form-control" name="razonSocial" value="{{(isset($factura))?$factura->razonSocial:old('razonSocial')}}" required>
    </div>

    <div class="col-12"> <div form-group>
        <lavel for="resIVA">IVA</label>
        <input id="resIVA" type="int" class="form-control" name="iva" value="{{(isset($factura))?$factura->iva:old('iva') }}" required>
    </div>
        </div>
</div>