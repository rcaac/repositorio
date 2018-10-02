@extends('frontend.home')

@section('content')
    @if(Session::has('flash_message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('flash_message') }}
        </div>
    @endif
    <div class="row">

        <div class="col-xs-12">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <a href="{{ asset('encuestas') }}" class="btn btn-primary btn-submit"> <--- Retornar</a><br><br>
                <h3 class="text-center">{{ $survey->title }}</h3> <br/>
                <p style="text-align: justify">
                    {{ $survey->description }}
                    {{--<br/>Creado por: <a href="">{{ $survey->user->firstname }}, {{ $survey->user->lastname }}</a>--}}
                </p><br>
                {!! Form::open(array('action'=>array('AnswerController@store', $survey->id))) !!}
                @forelse ($survey->questions as $key=>$question)
                    <h4 style="font-weight: normal; color: #63A4CF">Pregunta {{ $key+1 }} - {{ $question->title }}</h4>
                    @if($question->question_type === 'radio')
                        @foreach($question->option_name as $key=>$value)
                            <p style="margin:2px; padding:5px; /*display: inline*/">
                                <input type="radio" id="{{ $key }}" name="{{ $question->id }}[answer][]" value="{{ $key+1 }}"/>
                                <label for="{{ $key }}">{{ $value }}</label>
                            </p>
                        @endforeach
                    @elseif($question->question_type === 'checkbox')
                        @foreach($question->option_name as $key=>$value)
                            <p style="margin:0px; padding:0px;">
                                <input type="checkbox" id="something{{ $key }}" name="{{ $question->id }}[answer][]" value="{{ $key+1 }}"/>
                                <label for="something{{$key}}">{{ $value }}</label>
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
                    <div class="divider" style="margin:10px 10px;"></div>
                @empty
                    <span class='flow-text center-align'>Nothing to show</span>
                @endforelse
                {{ Form::submit('Enviar Encuesta', array('class'=>'btn btn-primary btn-submit')) }}
                {!! Form::close() !!}
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>
@stop