@extends('layouts.app')

@section('title', $post->title)

@push('styles')
    @livewireStyles
    <link href="{{ asset('assets/vendor/izitoast/iziToast.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
    <div class="wrapper">
        <div class="page">
            <div class="page-inner">
                <div class="page-section">
                    <div class="section-block">
                        <livewire:show-post :post="$post"></livewire:show-post>
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="/assets/javascript/theme.min.js"></script>
@endsection

@push('styles')
    @livewireScripts
@endpush
