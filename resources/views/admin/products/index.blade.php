@extends('adminlte::page')



@section('title', 'CRUD Productos')

@section('content_header')
<h1>
Productos
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-products">
        Crear
    </button>
</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Listado de productos</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="products" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Producto</th>
                            <th>Stock</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $products )
                        <tr>
                        <td>{{ $products->id}}</td>
                        <td>{{ $products->name}}</td>
                        <td>{{ $products->stock}}</td>
                        <td>{{ $products->category->name }}</td>
                        
                        <td>
                            <button class="btn btn-success" data-toggle="modal" data-target="#modal-update-products-{{$products->id}}">Editar</button>
                            <form action="{{route('admin.products.delete',$products->id)}}" method="POST">
                                {{ csrf_field() }}
                                @method('DELETE')
                            <button class="btn btn-warning">Eliminar</button>
                            </form>
                        </td>
                        </tr>
                         <!-- modal - UPDATE POST -->
                         @include('admin.products.modal-update-products')
                        <!-- /.modal -->
                        @endforeach
                        <tbody>  
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>

<!-- modal -->
<form action="{{ route('admin.products.store') }}" method="POST">
{{ csrf_field() }}
<div class="modal fade" id="modal-create-products">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Registrar Producto </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
            <div class="modal-body">
            <label for="name">Producto</label>
                    <input class="form-control" name="name" id="name" type="text" maxlength="20"></input>
            </div>
            <div class="modal-body">
            <label for="stock">Stock</label>
                    <input class="form-control" name="stock" id="stock" type="number" maxlength="3"></input>
            </div>
            <div class="modal-body">
            <label for="category-id">Categoria</label>
                    <select class="form-control" name="category_id" id="category-id">
                    <option value="">--Elegir Categoria--</option>
                    @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                    </select>
                </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-outline-primary">Guardar</button>
            </div>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</form>
<!-- /.modal -->


@stop

@section('js')
<script>
$(document).ready(function() {
    $('#products').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
@stop