@extends('backend.main')

@section('content')

    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <strong>EDITAR INVESTIGACIÓN</strong>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('investigation.update', $investigation->id) }}" enctype="multipart/form-data">
                        {!! method_field('PUT') !!}
                        {!! csrf_field() !!}
                        {{ Form::hidden('user_id', auth()->user()->id) }}
                        {{ Form::hidden('download', 0) }}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="firstname"> Título</label>
                                        <textarea id="title" name="title" rows="2" class="form-control">{{$investigation->title}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Resumen</label>
                                        <textarea id="summary" name="summary" rows="18" class="form-control">{{$investigation->summary}}</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="page">Páginas(p.)</label>
                                        <input type="text" class="form-control col-sm-4" id="page" name="page" value="{{$investigation->page}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="dimension">Dimensión(cm.)</label>
                                        <input type="text" class="form-control col-sm-4" id="dimension" name="dimension" value="{{$investigation->dimension}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="size">Tamaño(mb.)</label>
                                        <input type="text" class="form-control col-sm-4" id="size" name="size" value="{{$investigation->size}}">
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('state', 'Estado')}}
                                        {{ Form::select('state_id', $status, $investigation->state->id, array('class' => 'form-control')) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('subject', 'Tema')}}
                                        {{ Form::select('subject_id', $subjects, $investigation->subject->id, array('class' => 'form-control')) }}
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
                            <button type="submit" class="btn btn-primary btn-lg">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>

@endsection