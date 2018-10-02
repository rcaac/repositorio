@extends('backend.main')

@section('content')
    <div class="col-lg-12">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createInvestigation">
            <i class="icon-plus"></i> Nuevo
        </button>
        <a href="{{ route('book.chart') }}" class="btn btn-warning float-right"><i class="icon-chart"></i> Reportes</a><br><br>

        <div class="card">
            <div class="card-header">
                <i class="icon-layers icons font-2xl"></i> <strong class="font-2xl">INVESTIGACIONES</strong>
            </div>
            <div class="card-body">
                <div id="list-investigation"></div>
            </div>
        </div>
    </div>
    <!--/.col-->

    <div class="modal fade" id="createInvestigation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-success" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="icon-book-open"></i> NUEVA INVESTIGACIÓN</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form method="POST" action="#" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ Form::hidden('user_id', auth()->user()->id) }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="firstname"> Título</label>
                                    <textarea id="title" name="title" rows="2" class="form-control" placeholder="Ingresa el título de la investigación"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="description">Resumen</label>
                                    <textarea id="summary" name="summary" rows="18" class="form-control" placeholder="Ingresa el resumen del trabajo de investigación"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="page">Páginas(p.)</label>
                                    <input type="text" class="form-control col-sm-4" id="page" name="page">
                                </div>
                                <div class="form-group">
                                    <label for="dimension">Dimensión(cm.)</label>
                                    <input type="text" class="form-control col-sm-4" id="dimension" name="dimension">
                                </div>
                                <div class="form-group">
                                    <label for="size">Tamaño(mb.)</label>
                                    <input type="text" class="form-control col-sm-4" id="size" name="size">
                                </div>
                                <div class="form-group">
                                    {{ Form::label('state', 'Estado')}}
                                    {{ Form::select('state', $status, null, array('class' => 'form-control')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('subject', 'Tema')}}
                                    {{ Form::select('subject', $subjects, null, array('class' => 'form-control')) }}
                                </div>
                                <div class="form-group">
                                    <label for="firstname"> Subir archivo</label><br>
                                    <input type="file" id="file" name="file">
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
                    <input type="hidden" class="hidden inv">
                    Realmente desea eliminar este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger actionInv" data-dismiss="modal">Eliminar</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection