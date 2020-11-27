@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="page">
            <div class="page-inner">
                <div class="page-section">
                    <div class="section-block">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    @foreach($posts as $post)
                                        @include('posts.preview')
                                    @endforeach

                                    <div class="mt-4 d-flex justify-content-center">
                                        {!! $posts->links() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
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
