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
