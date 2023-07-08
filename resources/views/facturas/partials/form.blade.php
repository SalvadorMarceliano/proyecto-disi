@csrf
<div class="container-md">
  <div class="col-12">

    <div class="col-12"> <div form-group>
        <lavel for="">Razon Social</label>
        <input  type="decimal" class="form-control" name="razonSocial" value="{{(isset($factura))?$factura->razonSocial:old('razonSocial')}}" required>
    </div>

    </div>
        <div class="col-12"> <div form-group>
        <lavel for="">RFC</label>
        <input type="text" class="form-control" name="rfc" value="{{(isset($factura))?$factura->rfc:old('rfc')}}" oninput="calcularIVA()"required>
    </div>

    <div class="col-12">
        <div class="form-group">
            <label for="">Venta</label>
            <select class="form-control" name="idventa">
                <option value="0">Seleccione una opcion</option>
                @foreach($ventas as $venta)
                <option value="{{$venta->idventa}}" @isset($factura)
                {{($factura->idVenta == $venta->idVenta)?'selected':""}}
                @endisset>{{ $venta->idVenta }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!--<div class="col-12"> <div form-group>
        <lavel for="">total</label>
        <input id="total" type="decimal" class="form-control" name="total" value="{{old('total')}}" required>
    </div>-->

    <div class="col-12"> <div form-group>
        <lavel for="resIVA">IVA</label>
        <input id="resIVA" type="int" class="form-control" name="iva" value="{{(isset($factura))?$factura->iva:old('iva') }}" required>
    </div>
        </div>
</div>