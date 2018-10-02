@extends('backend.main')

@section('content')
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <strong>Agregar preguntas</strong>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('store.question') }}" id="boolean">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {{ Form::hidden('survey_id', $id) }}
                        <div class="form-group">
                            <div class="form-group">
                                {{ Form::label('Valuation', 'Valoración')}}
                                {{ Form::select('valuation_id', $valuation, null, array('class' => 'form-control')) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title">Pregunta</label>
                            <input name="title" id="title" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="question_type" id="question_type">
                                <option value="" disabled selected>Elige una opción</option>
                                <option value="radio">Opción Simple</option>
                                <option value="checkbox">Opción Múltiple</option>
                                <option value="text">Texto</option>
                                <option value="textarea">Cuadro de texto</option>
                            </select>
                        </div>
                        <!-- this part will be chewed by script in init.js -->
                        <span class="form-g"></span>

                        <div class="input-field form-group">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
@stop