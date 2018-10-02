<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Prime Bootstrap 4 Admin Template">
    <meta name="author" content="Lukasz Holeczek">
    <meta name="keyword" content="Prime Bootstrap 4 Admin Template">
    <!-- <link rel="shortcut icon" href="assets/ico/favicon.png"> -->

    <title>Prime Bootstrap 4 Admin Template</title>

    <!-- Icons -->
    <link href="{{ asset('admin/vendors/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/vendors/css/simple-line-icons.min.css') }}" rel="stylesheet">

    <!-- Main styles for this application -->
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

    <!-- Styles required by this views -->

</head>

<body class="app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card-group mb-4">
                <div class="card p-4">
                    <div class="card-body">
                        <h1>Login</h1>
                        <p class="text-muted">Sign In to your account</p>
                        <form method="POST" action="login">
                            {!! csrf_field() !!}
                            <div class="input-group mb-3">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <span class="input-group-addon"><i class="icon-user"></i></span>
                                <input type="text" class="form-control" name="username">
                            </div>
                            <div class="input-group mb-4">
                                <span class="input-group-addon"><i class="icon-lock"></i></span>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary px-4">Entrar</button>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="button" class="btn btn-link px-0">Forgot password?</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap and necessary plugins -->
<script src="{{ asset('admin/vendors/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/vendors/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/vendors/js/bootstrap.min.js') }}"></script>

</body>
</html>