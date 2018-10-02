@extends('backend.main')

@section('content')
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <i class="icon-note icons font-2xl"></i> <strong class="font-2xl">EDITAR PREGUNTA</strong></h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('update.question', $question->id) }}">
                      {{ method_field('PATCH') }}
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">
                       <div class="row">
                           <div class="col-sm-12">
                               <div class="form-group">
                                   <label for="title">Pregunta:</label>
                                   <input type="text" name="title" class="form-control" id="title" value="{{ $question->title }}">
                               </div>
                           </div>
                           <div class="col-sm-12">
                               <div class="form-group">
                                   <label for="title">Opciones:</label>
                                   @foreach($question->option_name as $key=>$value)
                                       <p style="margin:0px; padding:0px;">
                                           <input class="form-control" name="option_name[]" id="option_name[]" type="text" value="{{$value}}">
                                       </p>
                                   @endforeach
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
    </div>
@stop