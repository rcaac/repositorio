@extends('frontend.home')

@section('header')
    <div class="header">
        <div class="bg-color">
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
                                                <a class="dropdown-item" href="logout"  style="margin-left: 2px"><i class="fa fa-lock"></i> Cerrar sesión</a><br>
						@if(Auth::user()->role_id==1)
                                                    <a class="dropdown-item" href="{{ route('user.index') }}"><i class="fa fa-adn"></i> Panel</a>
                                                @elseif(Auth::user()->role_id==2)
                                                    <a class="dropdown-item" href="{{ route('user.index') }}"><i class="fa fa-adn"></i> Panel</a>
                                                @elseif(Auth::user()->role_id==3)
                                                    <a class="dropdown-item" href="{{ route('user.index') }}"><i class="fa fa-adn"></i> Panel</a>
                                                @endif
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
            <div class="wrapper">

                <div class="banner-info text-center wow fadeIn delay-05s">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="{{asset('img/sl1.jpg')}}" style="width: 1920px; height: 700px;">
                                <div class="carousel-caption">

                                </div>
                            </div>
                            <div class="item">
                                <img src="{{asset('img/sl2.jpg')}}" style="width: 1920px; height: 700px">
                                <div class="carousel-caption">
                                    ...
                                </div>
                            </div>
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row" style="margin-top: 2%; margin-bottom: 10%">
        <div class="col-sm-4">
            <div class="w3-card-4" style="height: 150px; border-radius: 0.375rem;">
                <div class="w3-container">
                    <img src="{{asset('img/repo.svg')}}" style="width: 120px; height: 80px;float: left;margin-top: 30px">
                </div>
                <div style="margin-right: 1%;padding-bottom: 10%;width: 95%;margin-top: 45px;">
                    <h3 style="color: #63A4CF;">Repositorio de investigaciones</h3>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="w3-card-4" style="height: 150px; border-radius: 0.375rem;">
                <div class="w3-container">
                    <img src="{{asset('img/survey.svg')}}" style="width: 120px; height: 80px;float: left;margin-top: 30px">
                </div>
                <div style="margin-right: 1%;padding-bottom: 10%;width: 95%;margin-top: 45px;">
                    <h3 style="color: #ff5483;">Encuesta a estudiantes</h3>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="w3-card-4" style="height: 150px; border-radius: 0.375rem;">
                <div class="w3-container">
                    <img src="{{asset('img/biblio.svg')}}" style="width: 120px; height: 80px;float: left;margin-top: 30px">
                </div>
                <div style="margin-right: 1%;padding-bottom: 10%;width: 95%;margin-top: 45px;">
                    <h3 style="color: #a951ed;">Libros digitales</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <img src="img/swimlane-real-time-sharing.svg" class="screenshot" width="450" height="300">
        </div>
        <div class="col-sm-7 col-sm-push-1">
            <h2>Repositorio de Investigación</h2>
            <p style="text-align: justify">
                Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño.
                El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo
                "Contenido aquí, contenido aquí". Estos textos hacen parecerlo un español que se puede leer.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 col-sm-push-8">
            <img src="img/swimlane-shared-full-context.svg" class="screenshot" width="450" height="300">
        </div>
        <div class="col-sm-7 col-sm-pull-4">
            <h2>Encuesta a Estudiantes</h2>
            <p style="text-align: justify">
                Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño.
                El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo
                "Contenido aquí, contenido aquí". Estos textos hacen parecerlo un español que se puede leer.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <img src="img/swimlane-collaborative-editing.svg" class="screenshot" width="450" height="300">
        </div>
        <div class="col-sm-7 col-sm-push-1">
            <h2>Libros Digitales</h2>
            <p style="e: 1.2rem;text-align: justify">
                Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño.
                El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario de usar textos como por ejemplo
                "Contenido aquí, contenido aquí". Estos textos hacen parecerlo un español que se puede leer.
            </p>
        </div>
    </div>
@endsection
