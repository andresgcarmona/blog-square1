@section('scripts')
    <script src="https://kit.fontawesome.com/67712e0e7d.js" crossorigin="anonymous"></script>

    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>

    @stack('scripts')
@show
