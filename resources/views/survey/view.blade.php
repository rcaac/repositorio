@extends('backend.main')

@section('content')
  <div class="card">
      <div class="card-content">
      <span class="card-title"> Comience a tomar la encuesta</span>
      <p>
        <span class="flow-text">{{ $survey->title }}</span> <br/>
      </p>
      <p>  
        {{ $survey->description }}
        <br/>Creado por: <a href="">{{ $survey->user->firstname }}, {{ $survey->user->lastname }}</a>
      </p>
      <div class="divider" style="margin:20px 0px;"></div>
          {!! Form::open(array('action'=>array('AnswerController@store', $survey->id))) !!}
          @forelse ($survey->questions as $key=>$question)
            <p class="flow-text">Pregunta {{ $key+1 }} - {{ $question->title }}</p>
                @if($question->question_type === 'radio')
                  @foreach($question->option_name as $key=>$value)
                    <p style="margin:0px; padding:0px;">
                      <input name="{{ $question->id }}[answer]" type="radio" id="{{ $key }}" />
                      <label for="{{ $key }}">{{ $value }}</label>
                    </p>
                  @endforeach
                @elseif($question->question_type === 'checkbox')
                  @foreach($question->option_name as $key=>$value)
                  <p style="margin:0px; padding:0px;">
                    <input type="checkbox" id="something{{ $key }}" name="{{ $question->id }}[answer]" />
                    <label for="something{{$key}}">{{ $value }}</label>
                  </p>
                  @endforeach
                @endif 
              <div class="divider" style="margin:10px 10px;"></div>
          @empty
            <span class='flow-text center-align'>Nothing to show</span>
          @endforelse
        {{ Form::submit('Submit Survey', array('class'=>'btn waves-effect waves-light')) }}
        {!! Form::close() !!}
    </div>
  </div>
@stop