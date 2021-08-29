<div class="modal fade" id="modal-update-products-{{$products->id}}">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar Datos del Producto </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('admin.products.update',  $products->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="modal-body">
            <label for="name">Producto</label>
                    <input class="form-control" name="name" id="name" type="text" maxlength="20" value="{{$products->name}}"></input>
            </div>
            <div class="modal-body">
            <label for="stock">Stock</label>
                    <input class="form-control" name="stock" id="stock" type="number" value="{{$products->stock}}" maxlength="3"></input>
            </div>
            <div class="modal-body">
            <label for="category_id">Categoria</label>
            <select name="category_id" id="category_id" class="form-control">
                            <option value="">-- Elegir categoría --</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" <?= $category->id == $products->category->id ? 'selected': '' ?> > {{$category->name}}</option>
                            @endforeach
                        </select>
                </div>
            
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-outline-primary">Actualizar</button>
            </div>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
                            </form>