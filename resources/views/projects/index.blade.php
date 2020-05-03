@extends('layouts.app')
@section('content')
    <x-notify/>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Test</h3>
        </div>
        <div class="card-body">
            <div id="example2" class="dataTables_wrapper dt-bootstrap4">

            </div>
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
                    if (error.response.data.error.code !== 'unauthenticated') {
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
