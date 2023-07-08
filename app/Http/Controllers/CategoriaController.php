<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriaModel;  

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categorias = CategoriaModel::select('*')->orderBy('idCategoria', 'ASC');
        $limit=(isset($request->limit)) ? $request->limit:5;

        if(isset($request->search)){
            $categorias = $categorias->where('idCategoria', 'like', '%'.$request->search.'%')
            ->orWhere('nombre','like', '%'.$request->search.'%')
            ->orWhere('descripcion','like', '%'.$request->search.'%');
    }
    $categorias = $categorias->paginate($limit)->appends($request->all());
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = CategoriaModel::get();
        return view('categorias.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categoria = new CategoriaModel();
        $categoria = $this->createUpdateCategoria($request, $categoria);
        return redirect()->route('categorias.index');
    }

    public function createUpdateCategoria(Request $request, $categoria){
        $categoria->Nombre=$request->Nombre;
        $categoria->Descripcion=$request->Descripcion;
        $categoria->save();
        return $categoria;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = CategoriaModel::where('idCategoria', $id)->firstOrFail();
        return view('categorias.show',compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria=CategoriaModel::where('idCategoria', $id)->firstOrFail();
        return view('categorias.edit', compact('categoria'));
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
        $categoria=CategoriaModel::where('idCategoria', $id)->firstOrFail();
        $categoria=$this->createUpdateCategoria($request, $categoria);   
        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria=CategoriaModel::findOrFail($id);
        try {
            $categoria->delete();
            return redirect()
            ->route('categorias.index')
            ->with('message', 'Registro eliminado correctamente');
        } catch (QueryException $e) {
            return redirect()
            ->route('categorias.index')
            ->with('danger', 'Registro relacionado imposible de eliminar');
        }
    }

    public function exportPDF()
    {
        $categorias = CategoriaModel::all();
        $pdf = PDF::loadView('categorias.exportPDF',compact('categorias'));
        //Linea para mostrar hoja en horizontal
        $pdf->setPaper('a4','landscape');

        //Línea para mostrar pdf en el navegador
        return $pdf->stream();
    }
}
