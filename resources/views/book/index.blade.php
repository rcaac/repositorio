@extends('backend.main')

@section('content')
    <div class="col-lg-12">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal">
            <i class="icon-plus"></i> Nuevo
        </button>
        <a href="{{ route('book.chart') }}" class="btn btn-warning float-right"><i class="icon-chart"></i> Reportes</a><br><br>

        <div class="card">
            <div class="card-header">
                <i class="icon-book-open icons font-2xl"></i> <strong class="font-2xl">LIBROS</strong>
            </div>
            <div class="card-body">
                <div id="list-books"></div>
            </div>
            <div class="text-center">

            </div>
        </div>

    </div>
    <!--/.col-->

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-demo modal-success" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="icon-book-open"></i> NUEVO LIBRO</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="firstname"> Título</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="Ingresa el título ">
                                </div>
                                <div class="form-group">
                                    <label for="firstname"> Autor</label>
                                    <input type="text" class="form-control" id="author" name="author" placeholder="Ingresa el autor">
                                </div>
                                <div class="form-group">
                                    <label for="firstname"> ISBN</label>
                                    <input type="text" class="form-control col-sm-4" id="isbn" name="isbn" placeholder="Ingresa el ISBN">
                                </div>
                                <div class="form-group">
                                    <label for="firstname"> Link</label>
                                    <input type="text" class="form-control" id="link" name="link" placeholder="Ingresa el link">
                                </div>
                                <div class="form-group">
                                    <label for="firstname"> Subir miniatura</label><br>
                                    <input type="file" id="cover" name="cover">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-primary" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="icon-note"></i> EDITAR USUARIO</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" action="#">
                    {{ csrf_field() }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="modal-body">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                        <input type="hidden" id="dimension_id">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="firstname"> Nombres</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname">
                                </div>
                                <div class="form-group">
                                    <label for="lastname"> Apellidos</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" >
                                </div>
                                <div class="form-group">
                                    <label for="email"> Correo electrónico</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="password"> Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Categoría</label>
                                    <select class="form-control" id="category" name="category"></select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Tema</label>
                                    <select class="form-control" id="subject" name="subject"></select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Posición</label>
                                    <select class="form-control" id="position" name="position"></select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Rol</label>
                                    <select class="form-control" id="role" name="role"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="update-user" data-dismiss="modal">Guardar</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-danger" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="icon-note"></i> ELIMINAR USUARIO</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{csrf_token()}}" id="token">
                    <input type="hidden" class="hidden did">
                    Realmente desea eliminar este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger actionBtn" data-dismiss="modal">Eliminar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection