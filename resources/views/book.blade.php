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
                            <h2 class="bnr-sub-title">LIBROS DIGITALES</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h3 class="text-center">Publicaciones Recientes</h3><br>

            <div id="custom-search-input" style="margin-bottom: 45px; margin-right: 70px">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control input-lg" placeholder="Buscar" />
                </div>
            </div>
                @if(auth()->check())
                <div class="alert alert-success col-md-8">
                    <strong>Usuario:</strong> Psicolibrovirtual@gmail.com<br>
                    <strong>Contraseña:</strong> Psicologia1%
                </div>
                @endif
            </div>

            <div class="row">
                @foreach($books as $book)
                    <div class="col-sm-6 col-md-4" style="padding-bottom: 2%">
                        <div class="w3-card-4" style="height: 400px; width: 300px;">
                            <img src="{{ asset($book->cover) }}"  style="width: 100%; height: 280px; padding-left: 5%; padding-right: 5%; padding-top: 5%">
                            <div class="w3-container">
				@if(auth()->check())
                                {{link_to_action('BookController@checkBook', $book->title,
                                 ['link' => $book->link, 'id' => $book->id, 'check' => isset($book->check) ? $book->check : 0],
                                 ['target' => '_blank'])
                                }}
				@else				
				<p style='color:#337ab7'>{{ $book->title}}</p>
				@endif
                                <p>Autor: {{ $book->author}}</p>
                                <p>ISBN: {{ $book->isbn}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        <div class="text-center">
            {{ $books->links() }}
        </div>
    </div>
@endsection
