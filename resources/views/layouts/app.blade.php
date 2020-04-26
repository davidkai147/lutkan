@extends('layouts.master')
@section('body')
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <x-nav-bar/>
        <x-side-bar/>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <x-content-header/>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

    </div>
    <x-footer/>
@endsection
@section('app_js')
    <script>
        // Check isLogin or not
        $(document).ready(function() {
            let token = localStorage.getItem('token');
            if (token !== null) {
                API('users/info', {}).then(function (response) {
                    if (response.data.data) {
                        let user = response.data.data;
                        // Set side-bar
                        $(".info > .d-block").append(user.name);
                        // Update role & permissions
                        userRole = user.roles[0].name;
                        userPermissions = user.roles[0].permissions;

                        // Show hide menus based on role & permissions
                        let menuPermissions = userPermissions.filter(item => item.name.indexOf('READ_') >= 0);
                        $.each(menuPermissions, function (key, value) {
                            $("li[data-permission='" + value.name + "']").show();
                        })
                    }
                }).catch(function(error) {
                    handleErrorLaravel('toast', error.response.data, 'error');
                });
                return;
            }
            window.location.replace(CONFIG.BASE_URL + "login");
        });

        // Logout
        $(".btnLogout").click(function (e) {
            e.preventDefault();
            API('users/logout', {}).then(function (response) {
                localStorage.removeItem('token');
                window.location.replace(CONFIG.BASE_URL + "login");
            }).catch(function (error) {
                handleErrorLaravel('toast', 'Không thể logout', 'error');
            });
        });
    </script>
@endsection
