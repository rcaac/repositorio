@extends('backend.main')

@section('content')
    <div class="col-lg-12">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal">
            <i class="icon-plus"></i> Nuevo
        </button><br><br>
        <div class="card">
            <div class="card-header">
                <i class="icon-people icons font-2xl"></i><strong class="font-2xl">USUARIOS</strong>
                <div class="input-group col-md-4 pull-right">
                     <input type="text" class="form-control" id="searchUser">
                     <span class="input-group-addon"><i class="fa fa-search"></i></span>
            	</div>
            </div>            
            <div class="card-body">
                <div id="list-users"></div>
            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-success" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="icon-people"></i> NUEVO USUARIO</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" action="{{ route('user.store') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="firstname"> Nombres</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Ingresa sus nombres">
                            </div>
                            <div class="form-group">
                                <label for="lastname"> Apellidos</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Ingresa sus apellidos">
                            </div>
                            <div class="form-group">
                                <label for="email"> Correo electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Ingresa su correo electrónico">
                            </div>
                            <div class="form-group">
                                <label for="password"> Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Ingresa su contraseña">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                {{ Form::label('Category', 'Categoría')}}
                                {{ Form::select('category', $categories, null, array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Position', 'Posición')}}
                                {{ Form::select('position', $positions, null, array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Subject', 'Tema')}}
                                {{ Form::select('subject', $subjects, null, array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Role', 'Role')}}
                                {{ Form::select('role', $roles, null, array('class' => 'form-control')) }}
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