@extends('backend.main')

@section('content')

    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">
                    <strong>Crear Encuesta</strong>
                </div>
                <div id="chart-div"></div>
                {!! Lava::render('ColumnChart', 'Finances', 'chart-div') !!}
            </div>
        </div>
        <div class="col-sm-2"></div>
    </div>

@endsection