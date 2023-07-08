<?php

namespace App\Http\Controllers;
use App\Models\facturasModel;
use App\Models\ventasModel;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class facturasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $facturas = facturasModel::select('*')->orderBy('idfactura','DESC');
        $ventas = ventasModel::get();
        $limit=(isset($request->limit)) ? $request->limit:10;
            if(isset($request->search)){
                $facturas=$facturas->where('idfactura','like','%'.$request->search.'%')
                ->orWhere('razonSocial','like','%'.$request->search.'%')
                ->orWhere('rfc','like','%'.$request->search.'%')
                ->orWhere('idVenta','like','%'.$request->search.'%')
                ->orWhere('iva','%'.$request->search.'%');
            }
        $facturas = $facturas->paginate($limit)->appends($request->all());
        return view('facturas.index', compact('facturas','ventas'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ventas = ventasModel::get();
        return view('facturas.create',compact('ventas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $factura = new facturasModel();
        $factura = $this->cUfactura($request,$factura);
        return redirect()->route('facturas.index');
    }

    /**
     * Display the specified resource.
     */

     public function cUfactura(Request $request,$factura)
     {
         $factura->razonSocial=$request->razonSocial;
         $factura->rfc=$request->rfc;
         $factura->idVenta=$request->idVenta;
         $factura->iva=$request->iva;
         $factura->save();
         return $factura;
     }

    public function show($id)
    {
        $factura=facturasModel::where('idfactura', $id)->firstOrFail();  
        $ventas=ventasModel::get();
        return view('facturas.show',compact('factura', 'ventas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $factura=facturasModel::where('idfactura',$id)->findOrFail($id);
        $ventas = ventasModel::get();
        $pdf = PDF::loadView('facturas.impFactura', compact('factura','ventas'));
        $pdf->setPaper('a4','landscape');
        return $pdf->stream();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $factura=facturasModel::findOrFail($id);

        try {
        $factura->delete();
        return redirect()
        ->route('facturas.index')
        ->with('Message', "registroe liminado");
        }catch(QeryException $e){
        return redirect()
        ->route('facturas.index')
        ->with('danger', 'mensaje imposible de aliminar');
        }
    }

}
