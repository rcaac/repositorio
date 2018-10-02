@extends('backend.main')

@section('content')
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
                <i class="icon-note icons font-2xl"></i> <strong class="font-2xl">EDITAR ENCUESTA</strong></h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('update.survey', $survey->id) }}">
                  {{ method_field('PATCH') }}
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <div class="row">
                       <div class="col-sm-12">
                           <div class="form-group">
                               <label for="title">Pregunta:</label>
                              <input type="text" class="form-control" name="title" id="title" value="{{ $survey->title }}">
                           </div>
                       </div>
                       <div class="col-sm-12">
                           <div class="form-group">
                               <label for="description">Descripción:</label>
                              <textarea id="description" class="form-control" name="description">{{ $survey->description }}</textarea>
                           </div>
                       </div>
                       <div class="col-sm-12">
                           <div class="form-group">
                              <button type="submit" class="btn btn-outline-primary btn-lg">Actualizar</button>
                           </div>
                       </div>
                  </div>
                </form>
            </div>
        </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
@stop