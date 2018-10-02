@extends('frontend.home')

@section('header')
    <div class="header-2">
        <div class="bg-color-2">
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
            </header><br><br><br><br><br><br>
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="banner-info text-center wow fadeIn delay-05s">
                            <h2 class="bnr-sub-title">REPOSITORIO DE INVESTIGACIONES</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
        <div class="row">
            <div class="col-lg-12">
                <a class="list-group-item active"><span class="h5 list-group-item-heading  h5"><h4>ESCUELA ACADÉNICO PROFESIONAL DE PSICOLOGÍA</h4></span></a><br>
                <p align="justify">
                    <i>La Escuela Académico Profesional de Psicología</i> de la Universidad Nacional Hermilio Valdizan del Perú se creó en marzo del 2002.Esta comunidad de profesores se ha caracterizado tanto por su labor docente como por su dedicación permanente a la investigación de los temas relevantes para la facultad y la ciudad. <br>Ingresa a su web: <a href="#">Escuela Académico Profesional de Psicología</a>
                </p>
                <h3>Publicaciones Recientes</h3><br>
            </div>

            <div class="col-lg-3 hidden-xs hidden-sm hidden-md">
                <div class="thumbnail">
                    @foreach($investigations as $investigation)
                        <img src="{{ asset('storage/'.$investigation->cover) }}"><br>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-9">
                @foreach($investigations as $investigation)
                    <div>
                        <div>
                            <h4> {{ link_to_action('InvestigationController@showInvestigation', $investigation->title, [$investigation->url], ['target' => '_self']) }} </h4>
                        </div>
                        <div>
                            <p style="color: #63A4CF">{{ $investigation->user->firstname}}, {{$investigation->user->lastname  }}
                                (Universidad Nacional Hermilio Valdizán. Escuela Académico Profesional de Psicología, {{ $investigation->created_at }})</p>
                        </div>
                        <div>
                            <p>{{ Str::words($investigation->summary, 20,'....')  }}</p><br><br><br><br><br>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                {{ $investigations->links() }}
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
