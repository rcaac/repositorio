@extends('backend.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <br><br>
                <div class="card">
                    <div class="card-header">
                        <i class="icon-note icons font-2xl"></i> <strong class="font-2xl">ENCUESTAS</strong></h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        TÍTULO DE LA ENCUESTA
                                    </th>
                                    <th>
                                        ACCIONES
                                    </th>
                                </tr>
                            </thead>

                            <tbody>
                            @forelse ($surveys as $survey)
                                <tr>
                                    <td>
                                        {{ $survey->title }}
                                    </td>
                                    <td>
                                        <a href="question/{{ $survey->id }}/newQuestion" class="btn btn-primary btn-sm" >Agregar preguntas</a>
                                        <a href="survey/{{ $survey->id }}" class="btn btn-outline-primary btn-sm">Editar Encuesta</a>
                                        <a href="{{route('view.charts', $survey->id)}}" class="btn btn-outline-success btn-sm">Visualizar Reporte</a>
                                    </td>
                                </tr>
                            @empty
                                <p class="flow-text center-align">No hay encuestas por mostrar</p>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                    <a href="{{ route('new.survey') }}" style="float:right;" class="btn btn-primary btn-sm">Crear Nueva Encuesta</a>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
@stop