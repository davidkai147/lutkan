{{--@if (!empty(session('app_notify')))--}}
{{--    <div class="alert alert-success">--}}
{{--        <p>{{ session('app_notify') }}</p>--}}
{{--    </div>--}}
{{--@elseif($errors->any() || !empty(session('app_error')))--}}
{{--    <div class="alert alert-danger">--}}
{{--        @if (session('app_error'))--}}
{{--            <p>{{ session('app_error') }}</p>--}}
{{--        @else--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <p>{{ $error }}</p>--}}
{{--            @endforeach--}}
{{--        @endif--}}
{{--    </div>--}}
{{--@endif--}}
<div class="alert alert-danger" style="display:none"></div>
