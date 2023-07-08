<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClienteModel;
use App\Models\ProductoModel;   

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $productos = ProductoModel::select('*')->get();
        $clientes = ClienteModel::select('*')->orderBy('idCliente', 'ASC');
        $limit = (isset($request->limit)) ? $request->limit:5;

        if (isset($request->search)) {
            $clientes = $clientes->where('idCliente', 'like', '%'.$request->search.'%')
            ->orWhere('nombre','like', '%'.$request->search.'%')
            ->orWhere('apellidoPaterno','like', '%'.$request->search.'%')
            ->orWhere('apellidoMaterno','like', '%'.$request->search.'%')
            ->orWhere('rfc','like', '%'.$request->search.'%')
            ->orWhere('telefono','like', '%'.$request->search.'%')
            ->orWhere('correo','like', '%'.$request->search.'%')
            ->orWhere('direccion','like', '%'.$request->search.'%')
            ->orWhere('idProducto','like', '%'.$request->search.'%');
        }
        $clientes = $clientes->paginate($limit)->appends($request->all());
        return view('clientes.index', compact('clientes','productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos=ProductoModel::get();
        return view('clientes.create', compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new ClienteModel();
        $cliente = $this->createUpdateCliente($request, $cliente);
        return redirect()->route('clientes.index');
    }

    public function createUpdateCliente(Request $request, $cliente){
        $cliente->nombre=$request->nombre;
        $cliente->apellidoPaterno=$request->apellidoPaterno;
        $cliente->apellidoMaterno=$request->apellidoMaterno;
        $cliente->rfc=$request->rfc;
        $cliente->telefono=$request->telefono;
        $cliente->correo=$request->correo;
        $cliente->direccion=$request->direccion;
        $cliente->idProducto=$request->idProducto;
        $cliente->save();
        return $cliente;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente=ClienteModel::where('idCliente', $id)->firstOrFail();  
        $productos=ProductoModel::get();
        return view('clientes.show',compact('cliente', 'productos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente=ClienteModel::where('idCliente', $id)->firstOrFail();
        $productos=ProductoModel::get();
        return view('clientes.edit', compact('cliente','productos'));
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
        $cliente=ClienteModel::where('idCliente', $id)->firstOrFail();
        $cliente=$this->createUpdateCliente($request, $cliente);   
        return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente=ClienteModel::findOrFail($id);
        try {
            $cliente->delete();
            return redirect()
            ->route('clientes.index')
            ->with('message', 'Registro eliminado correctamente');
        } catch (QueryException $e) {
            return redirect()
            ->route('clientes.index')
            ->with('danger', 'Registro relacionado imposible de eliminar');
        }
    }
}
