<article class="d-flex flex-column w-100 post post-preview pb-2 mb-4 border-bottom">
    <header>
        <h1 class="mb-1">
            <a href="#">{{ $post->title }}</a>
        </h1>
        <div class="d-flex align-items-center">
            <div class="user-avatar user-avatar-md mr-2">
                <img src="/assets/images/avatars/uifaces{{ random_int(1, 22) }}.jpg" alt="User avatar" />
            </div>
            <span class="text-muted text-sm d-inline-block mr-3">{{ $post->author->name }}</span>
            <span class="text-muted">{{ $post->published_at->diffForHumans()  }}</span>
        </div>
    </header>
    <div class="mt-4">
        <p class="description">{{ $post->description }}</p>
    </div>
</article>
