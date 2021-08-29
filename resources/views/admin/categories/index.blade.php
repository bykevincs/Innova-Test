@extends('adminlte::page')



@section('title', 'CRUD Categorías')

@section('content_header')
<h1>
    Categorías
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create-category">
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
                    <h3 class="card-title">Listado de categorías</h3>
                </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="categories" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                        <td>{{ $category->id}}</td>
                        <td>{{ $category->name}}</td>
                        <td>
                            <button class="btn btn-success" data-toggle="modal" data-target="#modal-update-category-{{ $category->id}}">Editar</button>
                            <form action="{{route('admin.categories.delete',$category
                                ->id)}}" method="POST">
                                {{ csrf_field() }}
                                @method('DELETE')
                            <button class="btn btn-warning">Eliminar</button>
                            </form>
                        </td>
                        </tr>
                        <!-- modal Update-->
                        @include('admin.categories.modal-update-category')
                           
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
<form action="{{ route('admin.categories.store') }}" method="POST">
{{ csrf_field() }}
<div class="modal fade" id="modal-create-category">
    <div class="modal-dialog">
        <div class="modal-content bg-default">
            <div class="modal-header">
                <h4 class="modal-title">Crear Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                </div>
            <div class="modal-body">
            <label for="name">Categoria</label>
                    <input class="form-control" name="name" id="name" type="text" maxlength="20"></input>
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
    $('#categories').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
</script>
@stop