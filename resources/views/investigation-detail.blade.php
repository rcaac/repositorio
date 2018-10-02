@extends('frontend.home')

@section('header')
    <div class="header-2">
        <div class="bg-color-3">
            <header id="main-header">
                <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="{{ asset('/') }}">REPO<span class="logo-dec">PSICOLOGÍA</span></a>
                        </div>
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav navbar-right">
                                <li class=""><a href="{{ asset('/') }}">Inicio</a></li>
                                <li class=""><a href="{{ asset('investigaciones') }}">Investigaciones</a></li>
                                <li class=""><a href="{{ asset('encuestas') }}">Encuestas</a></li>
                                <li class=""><a href="{{ asset('libros') }}">Biblioteca</a></li>
                                @if(auth()->check())
                                    <ul class="nav navbar-nav ml-auto">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                                <span class="d-md-down-none"><b style="color: #63A4CF">{{ Auth::user()->firstname}}</b></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" style="padding: 20px">
                                                <a class="dropdown-item" href="logout"  style="margin-left: 2px"><i class="fa fa-lock"></i> Cerrar sesión</a>
                                            </div>
                                        </li>
                                    </ul>
                                @else
                                    <li class=""><a href="{{ asset('login') }}">Ingresar</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>
            </header>

        </div>
    </div>
@endsection

@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
        <div class="row">
            <div class="col-lg-12">
                <h2>{{$investigation->title}}</h2>
            </div>
            <hr>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                <div class="thumbnail" >
                    <img src="{{ asset('storage/'.$investigation->cover) }}"><br>
                    <h5>Ver</h5>
                    <i class="glyphicon glyphicon-file"></i>
                    @if( auth()->check())
                        {{link_to_action('InvestigationController@downloadEvidences', $investigation->title,
                         ['file' => $investigation->file, 'id' => $investigation->id, 'download' => isset($download) ? $download->download : 0],
                         ['target' => '_blank'])
                        }}
                    @else
                    {{$investigation->title}}
                    @endif
                    <p style="color: #337ab7">({{ $investigation->size }})</p>
                    <h5>Fecha de culminación</h5>
                    {{ $investigation->created_at }}
                    <h5>Autor</h5>
                    {{ $investigation->user->firstname}}, {{$investigation->user->lastname  }}
                    <h5>Categoría:</h5>
                    {{ $investigation->user->category->category}}
                    <h5>Status:</h5>
                    {{ $investigation->state->state }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-8">
                <h5>URI</h5>
                {{ link_to_action('InvestigationController@showInvestigation', null, [$investigation->url], ['target' => '_self']) }}<br><br>
                <div>
                    <p style="text-align: justify">{{ $investigation->summary }}</p>
                </div>
                <div>
                    <h5>Descripción</h5>
                    {{ $investigation->page }}.; {{ $investigation->dimension }}.
                </div>
                <div>
                    <h5>Tema</h5>
                    {{ $investigation->subject->subject }}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 sidebar">
            <div class="input-group">
                <input placeholder="Búsquedas" type="text" class="form-control">
                <span class="input-group-btn">
                <button title="Ir" class="ds-button-field btn btn-primary">
                    <span aria-hidden="true" class="glyphicon glyphicon-search"></span>
                </button>
            </span>
            </div><br>
            <div class="list-group">
                <a class="list-group-item active"><span class="h5 list-group-item-heading  h5">Mi cuenta</span></a>
                <a href="/index/community-list" class="list-group-item ds-option">Acceder</a>
            </div>
        </div>
    </div>
@endsection