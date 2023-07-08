<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ventasModel;
use App\Models\ProductoModel;
use Barryvdh\DomPDF\Facade;
use Illuminate\Database\QueryException;
use PDF;


class VentaController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productos = ProductoModel::select('*')->get();
        $ventas = ventasModel::select('*')->orderBy('idVenta', 'ASC');
        $limit=(isset($request->limit)) ? $request->limit:5;

        if(isset($request->search)){
            $ventas = $ventas->where('idVenta', 'like', '%'.$request->search.'%')
            ->orWhere('fecha','like', '%'.$request->search.'%')
            ->orWhere('cantidad','like', '%'.$request->search.'%')
            ->orWhere('total','like', '%'.$request->search.'%')
            ->orWhere('idProducto','like', '%'.$request->search.'%');
        }
        $ventas = $ventas->paginate($limit)->appends($request->all());
        return view('ventas.index', compact('ventas','productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos=ProductoModel::get();
        return view('ventas.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $venta = new ventasModel();
        $venta = $this->createUpdateVenta($request, $venta);
        return redirect()->route('ventas.editP',$venta->idVenta);
    }

    public function createUpdateVenta(Request $request, $venta){
        $venta->fecha=$request->fecha;
        $venta->cantidad=$request->cantidad;
        $venta->total=$request->total;
        $venta->idProducto=$request->idProducto;
        $venta->save();
        return $venta;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = ventasModel::where('idVenta', $id)->firstOrFail();
        $productos = ProductoModel::get();
        return view('ventas.show',compact('venta','productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productos = ProductoModel::get();
        $venta = ventasModel::where('idVenta', $id)->firstOrFail();
        return view('ventas.edit', compact('venta','productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $venta=ventasModel::where('idVenta', $id)->firstOrFail();
        $venta=$this->createUpdateVenta($request, $venta);   
        return redirect()->route('ventas.index');
    }

    public function editP(string $id)
    {
        $venta=ventasModel::where('idventa',$id)->firstOrFail();     
        $producto = ProductoModel::where('idProducto',$venta->idProducto)->firstOrFail();
        return view('ventas.editP', compact('venta','producto'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $venta=ventasModel::findOrFail($id);
        try {
            $venta->delete();
            return redirect()
            ->route('ventas.index')
            ->with('message', 'Registro eliminado correctamente');
        } catch (QueryException $e) {
            return redirect()
            ->route('ventas.index')
            ->with('danger', 'Registro relacionado imposible de eliminar');
        }
    }

    public function exportPDF(){
        $ventas = ventasModel::all();
        $pdf = PDF::loadView('ventas.exportPDF',compact('ventas'));
        //Linea para mostrar hoja en horizontal
        $pdf->setPaper('a4','landscape');

        //Línea para mostrar pdf en el navegador
        return $pdf->stream();
    }
}
