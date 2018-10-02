<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Prime - Bootstrap 4 Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,AngularJS,Angular,Angular2,jQuery,CSS,HTML,RWD,Dashboard,Vue,Vue.js,React,React.js">
    <link rel="shortcut icon" href="img/favicon.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Repopsicología</title>

    <!-- Icons -->
    <link href="{{ asset('admin/vendors/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/css/simple-line-icons.min.css') }}" rel="stylesheet">


    <!-- Main styles for this application -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" >

    <!-- Styles required by this views -->
    <link href="{{ asset('admin/vendors/css/gauge.min.css') }}" rel="stylesheet" >
    <link href="{{ ('admin/vendors/css/daterangepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.css') }}" rel="stylesheet">


</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
<header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none" type="button">☰</button>
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">☰</button>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
             @if(auth()->check())
                <span class="d-md-down-none">{{ Auth::user()->firstname}}</span>
             @endif
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>Sesión</strong>
                </div>
                <a class="dropdown-item" href="{{ route('view.out') }}"><i class="fa fa-lock"></i> Cerrar sesión</a>
            </div>
        </li>
        <button class="navbar-toggler" type="button">☰</button>

    </ul>
</header>
<div class="app-body">
    <div class="sidebar">
        <nav class="sidebar-nav">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ asset('/') }}"><i class="icon-speedometer"></i> PRINCIPAL</a>
                </li>
                <li class="divider"></li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-people"></i> Gestionar Usuarios</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.index') }}"><i class="icon-puzzle"></i> Usuarios</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-layers"></i> Repositorio</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('investigation.index') }}"><i class="icon-puzzle"></i> Investigaciones</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-note"></i> Encuestas</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('valuation.index') }}"><i class="icon-puzzle"></i> Valoración</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('survey') }}"><i class="icon-puzzle"></i> Encuesta</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="#"><i class="icon-book-open"></i> Biblioteca</a>
                    <ul class="nav-dropdown-items">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('books.index') }}"><i class="icon-puzzle"></i> libros</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <!-- Main content -->
    <main class="main">

        <!-- Breadcrumb -->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <!-- /Breadcrumb  -->



        <!-- /.conainer-fluid -->
        <div class="container-fluid">
            @yield('content')
        </div>
        <!-- /conainer-fluid -->
    </main>

</div>
<footer class="app-footer">
    <span>Repopsicología©2017 creativeLabs.</span>
</footer>

<!-- Bootstrap and necessary plugins -->
<script src="{{ asset('admin/vendors/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/vendors/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/vendors/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/vendors/js/pace.min.js') }}"></script>

<!-- Plugins and scripts required by all views -->
<script src="{{ asset('admin/vendors/js/Chart.min.js') }}"></script>

<!-- Prime main scripts -->
<script src="{{ asset('admin/js/app.js') }}"></script>

<!-- Plugins and scripts required by this views -->
<script src="{{ asset('admin/vendors/js/gauge.min.js') }}"></script>

<!-- Custom scripts required by this view -->
<script src="{{ asset('admin/js/views/main.js') }}"></script>

<!-- Plugins and scripts required by this views -->
<script src="{{ ('admin/vendors/js/jquery.maskedinput.min.js') }}"></script>
<script src="{{ ('admin/vendors/js/select2.min.js') }}"></script>

<script src="{{ ('admin/js/views/advanced-forms.js') }}"></script>
<script src="{{ asset('js/toastr.js') }}"></script>
<script src="{{ asset('js/init.js') }}"></script>

<script src="{{ asset('js/user.js') }}"></script>
<script src="{{ asset('js/research.js') }}"></script>
<script src="{{ asset('js/book.js') }}"></script>
<script src="{{ asset('js/valuation.js') }}"></script>
<script src="{{ asset('js/materialize.js') }}"></script>
<script>
    $('.collapse').collapse()
</script>
</body>
</html>