@csrf
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label for="">Nombre</label>
            <input type="tex" class="form-control" name="Nombre" value="{{(isset($categoria))?$categoria->Nombre:old('Nombre')}}" required>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group">
            <label for="">Categoria</label>
            <input type="text" class="form-control" name="Descripcion" value="{{(isset($categoria))?$categoria->Descripcion:old('Descripcion')}}" required>
        </div>
    </div>
</div>