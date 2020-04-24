@extends('layouts.app')
@section('content')
    <div>
        Đây là cái dashboard của user
    </div>
@endsection
@section('custom_js')
    <script>
        API('users/me', {}).then(function (response) {
            console.log(response);
        });
    </script>
@endsection
