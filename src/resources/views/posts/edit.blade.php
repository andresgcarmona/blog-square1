@extends('layouts.app')

@section('title', 'Edit post: '.$post->title)

@section('content')
    <div class="wrapper">
        <div class="page">
            <div class="page-inner">
                <div class="page-section">
                    <div class="section-block">
                        <article class="container post">
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <form method="POST" action="{{ route('post.update', $post) }}"
                                          class="form"
                                          id="edit-form"
                                          onsubmit="return true">
                                        @method('put')
                                        @csrf
                                    @include('posts.forms.post')
                                    </form>
                                </div>
                            </div>
                        </article>
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
