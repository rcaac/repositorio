@extends('backend.main')

@section('content')
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <div class="card">
        <div class="card-header">
          <i class="icon-list icons font-2xl"></i><strong class="font-2xl">NUEVA ENCUESTA</strong>
        </div>
        <div class="card-body">
          <form method="POST" action="{{ route('create.survey') }}" id="boolean">
            {{ csrf_field() }}
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="title">Título de la encuesta</label>
                  <input type="text" class="form-control" name="title" id="title">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea id="description" name="description" rows="3" class="form-control"></textarea>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="form-group form-actions">
                  <button type="submit" class="btn btn-outline-primary btn-lg">Crear</button>
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