@extends('layouts.master')
@section('custom_css')
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection
@section('body')
    <body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>lut</b>kan
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <x-notify />
                <form>
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember_me">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btnLogin">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
    </body>
@endsection
@section('custom_js')
    <script>
        // Check isLogin or not
        $(document).ready(function() {
            let token = localStorage.getItem('token');
            if (token !== null) {
                API('users/info', {}).then(function (response) {
                    if (response.data.data) {
                        window.location.replace(CONFIG.BASE_URL + "home");
                    }
                })
            }
        });

        // Login function
        $('.btnLogin').click(function(e) {
            $('.alert-danger').hide();
            $('.alert-danger').empty();
            e.preventDefault();
            API('users/login', {
                email: $("input[name='email']").val(),
                password: $("input[name='password']").val()
            }).then(function (response) {
                localStorage.setItem('token', response.data.data.token);
                window.location.replace(CONFIG.BASE_URL + "home");
            }).catch(function(error) {
                handleErrorLaravel('notify', error.response.data, 'error');
            });
        });

    </script>
@endsection
