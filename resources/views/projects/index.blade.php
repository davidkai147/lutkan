@extends('layouts.app')
@section('custom_css')
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection
@section('content')
    <x-notify/>
    <div class="row">
        <div class="col-lg-2 col-sm-6">
            <a href="#" class="btn btn-block btn-success">Create new project</a>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of projects</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>
                                <div  class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="checkAll" id="checkAll">
                                    <label for="checkAll"></label>
                                </div>
                            </th>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Created by</th>
                            <th>Updated by</th>
                            <th>Latest at</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div  class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="project1" id="project1">
                                    <label for="project1"></label>
                                </div>
                            </td>
                            <td>183</td>
                            <td>John Doe</td>
                            <td>11-7-2014</td>
                            <td><span class="tag tag-success">Approved</span></td>
                            <td><span class="tag tag-success">Approved</span></td>
                            <td><span class="tag tag-success">Approved</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        </tr>
                        <tr>
                            <td>
                                <div  class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="project2" id="project2">
                                    <label for="project2"></label>
                                </div>
                            </td>
                            <td>219</td>
                            <td>Alexander Pierce</td>
                            <td>11-7-2014</td>
                            <td><span class="tag tag-warning">Pending</span></td>
                            <td><span class="tag tag-warning">Pending</span></td>
                            <td><span class="tag tag-warning">Pending</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        </tr>
                        <tr>
                            <td>
                                <div  class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="project3" id="project3">
                                    <label for="project3"></label>
                                </div>
                            </td>
                            <td>657</td>
                            <td>Bob Doe</td>
                            <td>11-7-2014</td>
                            <td><span class="tag tag-primary">Approved</span></td>
                            <td><span class="tag tag-primary">Approved</span></td>
                            <td><span class="tag tag-primary">Approved</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        </tr>
                        <tr>
                            <td>
                                <div  class="icheck-primary d-inline ml-2">
                                    <input type="checkbox" value="" name="project4" id="project4">
                                    <label for="project4"></label>
                                </div>
                            </td>
                            <td>175</td>
                            <td>Mike Doe</td>
                            <td>11-7-2014</td>
                            <td><span class="tag tag-danger">Denied</span></td>
                            <td><span class="tag tag-danger">Denied</span></td>
                            <td><span class="tag tag-danger">Denied</span></td>
                            <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
@section('custom_js')
    <script>
        // Check isLogin or not
        $(document).ready(function() {
            let token = localStorage.getItem('token');
            if (token !== null) {
                API('projects/list', {}).then(function (response) {

                }).catch(function (error) {
                    if (error.response.data.error.code !== 401) {
                        handleErrorLaravel('toast', error.response.data, 'error');
                        window.location.replace(CONFIG.BASE_URL + "home");
                    } else {
                        logout();
                    }
                })
            }
        });

    </script>
@endsection
