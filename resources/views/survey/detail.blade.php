@extends('backend.main')

@section('content')
  <div class="container">
      <div class="card">
          <div class="card-header">
              <i class="icon-note icons font-2xl"></i> <strong class="font-2xl">{{ $survey->title }}</strong></h3>
          </div>
          <div class="card-body">
              <p>
                  {{ $survey->description }}
              </p>
              <br/>
              <a href="{{ route('edit.survey', $survey->id)}}" class="btn btn-primary btn-sm">Editar Encuesta</a>
              <a href="{{ route('delete.survey', $survey->id) }}" class="btn btn-danger btn-sm">Eliminar Encuesta</a>
              <hr>
              <div id="accordion" role="tablist">
                  @forelse ($survey->questions as $question)
                      <div class="card">
                          <div class="card-header" role="tab" id="headingOne">
                              <h5 class="mb-0">
                                  <a href="#collapse{{ $question->id }}" data-toggle="collapse" aria-expanded="true" aria-controls="collapseOne">
                                      {{ $question->title }}
                                  </a>
                                  <a href="{{ route('edit.question', $question->id) }}" style="float:right;" class="btn btn-outline-primary btn-sm">Edit</a>
                              </h5>
                          </div>
                          <div id="collapse{{ $question->id }}" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                  {!! Form::open() !!}
                                  @if($question->question_type === 'radio')
                                      @foreach($question->option_name as $key=>$value)
                                          <p style="margin:0px; padding:0px;">
                                              <input type="radio" id="{{ $key }}" />
                                              <label for="{{ $key }}">{{ $value }}</label>
                                          </p>
                                      @endforeach
                                  @elseif($question->question_type === 'checkbox')
                                      @foreach($question->option_name as $key=>$value)
                                          <p style="margin:0px; padding:0px;">
                                              <input type="checkbox" id="{{ $key }}" />
                                              <label for="{{$key}}">{{ $value }}</label>
                                          </p>
                                      @endforeach
                                  @elseif($question->question_type === 'text')
                                      <p style="margin:0px; padding:0px;">
                                          <input type="text" class="form-control" style="width:50%;" id="something{{ $key }}" name="{{ $question->id }}[answer][]"/>
                                      </p>
                                  @elseif($question->question_type === 'textarea')
                                      <p style="margin:0px; padding:0px;">
                                          <textarea id="textarea1" class="form-control" name="{{ $question->id }}[answer][]"></textarea>
                                      </p>
                                  @endif
                                  {!! Form::close() !!}
                              </div>
                          </div>
                      </div>
                  @empty
                      <span style="padding:10px;">No hay preguntas por mostrar</span>
                  @endforelse
              </div>
          </div>

    </div>
  </div>
@stop