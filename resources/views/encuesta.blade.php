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
                            <h2 class="bnr-sub-title">ENCUESTAS</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('welcome')
    <div class="row">
        <div class="banner-info text-center wow fadeIn delay-05s">
            <h1 class="bnr-title">BIENVENIDO</h1>
            <h2 class="bnr-sub-title">REPOSITORIO DE ENCUESTAS</h2>
            <p class="bnr-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip <br>ex ea commodo consequat.</p>
            <div class="overlay-detail">
                <a href="#feature"><i class="fa fa-angle-down"></i></a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Encuestas Recientes</h3><br>
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
                                        @if(auth()->check() && Auth::user()->role_id==3)
                                        <a href="{{ route('view.encuestas', $survey->id) }}" class="btn btn-primary btn-submit">Tomar Encuesta</a>
                                        @else
                                        <a href="#" class="btn btn-primary btn-submit">Tomar Encuesta</a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <p class="flow-text center-align">Nothing to show</p>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
@endsection