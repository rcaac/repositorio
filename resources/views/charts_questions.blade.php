@extends('backend.main')

@section('content')

    <div class="form-group">
        <a href="{{ URL::previous() }}" class="btn btn-primary btn-sm">Reporte por Dimensiones</a>
    </div>

    <div id="chart-div"></div>
    {!! Lava::render('BarChart', 'Question', 'chart-div') !!}

@endsection