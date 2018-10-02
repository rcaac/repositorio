@extends('backend.main')

@section('content')

    <div class="form-group">
        <a href="{{ route('view.questionCharts', $id) }}" class="btn btn-primary btn-sm">Reporte por Preguntas</a>
    </div>

    <div id="chart-div"></div>
    {!! Lava::render('ColumnChart', 'Finances', 'chart-div') !!}

@endsection