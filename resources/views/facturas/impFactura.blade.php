<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table class="table">
    <thead>
        <tr>
        <th scope="col"></th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr><td>id</td>
        <td>{{$factura->idfactura}}</td>
        </tr>
        <tr>
        <td>rfc</td>
        <td>{{$factura->rfc}}</td>
        </tr>
        <tr>
        <td>razon Social  </td>
        <td>{{$factura->razonSocial}}</td>
        </tr>
        <tr>
        <td>producto: </td>
        <td>id-{{$factura->idVenta}} {{$factura->venta->producto->nombre}}</td>
        </tr>
        <tr>
        <td>total: </td>
        <td>{{$factura->venta->total}}</td>
        </tr>
        <tr> 
        <td>IVA:</td>
        <td>{{$factura->iva}}</td>
        </tr>
    </tbody>
    </table>
</body>
</html>