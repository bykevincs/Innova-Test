<form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="modal fade" id="modal-update-category-{{ $category->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content bg-default">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Actualizar Categoría</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            </div>
                                        <div class="modal-body">
                                        <label for="name">Categoria</label>
                                                <input class="form-control" name="name" id="name" type="text" maxlength="20" value="{{ $category->name }}"></input>
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