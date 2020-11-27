@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="page">
            <div class="page-inner">
                <div class="page-section">
                    <div class="section-block">
                        <router-view></router-view>
                        <div class="container"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    @mix('js/app.js')
    <script src="/assets/javascript/theme.min.js"></script>
@endsection
