@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <div class="wrapper">
        <div class="page">
            <div class="page-inner">
                <div class="page-section">
                    <div class="section-block">
                        <article class="container post">
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <header class="mb-4">
                                        <h1 class="mb-1">
                                            <a href="#">{{ $post->title }}</a>
                                        </h1>
                                        <div class="d-flex align-items-center">
                                            <div class="user-avatar user-avatar-md mr-2">
                                                <img src="/assets/images/avatars/uifaces{{ random_int(1, 22) }}.jpg"
                                                     alt="User avatar"/>
                                            </div>
                                            <span class="text-muted text-sm d-inline-block mr-3">{{ $post->author->name }}</span>
                                            <span class="text-muted">{{ $post->published_at->diffForHumans()  }}</span>
                                        </div>
                                    </header>

                                    @can('edit', $post)
                                        <div class="my-4">
                                            <a href="#" class="btn btn-outline-primary mr-2">Edit</a>
                                            <label class="switcher-control switcher-control-lg">
                                                <input type="checkbox"
                                                       class="switcher-input"
                                                       id="publish"
                                                       name="publish"
                                                       checked>
                                                <span class="switcher-indicator"></span>
                                            </label>
                                            <label for="publish">Publish</label>
                                        </div>
                                    @endcan

                                    <div class="body" v-pre>
                                        {!! nl2br($post->body) !!}
                                    </div>
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
