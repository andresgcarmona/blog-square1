<article class="container post">
    <div class="row">
        <div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            <header class="mb-4">
                <h1 class="mb-1">
                    <a href="#">{{ $post->title }}</a>
                </h1>
                <div class="d-flex align-items-center">
                    <div class="user-avatar user-avatar-md mr-2" wire:ignore>
                        <img src="/assets/images/avatars/uifaces{{ random_int(1, 22) }}.jpg"
                             alt="User avatar"/>
                    </div>
                    <span class="text-muted text-sm d-inline-block mr-3">{{ $post->author->name }}</span>
                    <span class="text-muted">{{ $post->published_at ? 'Published: '.$post->published_at->diffForHumans() : 'Not published yet'  }}</span>
                </div>
            </header>

            @can('edit', $post)
                <div class="my-4">
                    <label class="switcher-control switcher-control-lg">
                        <input type="checkbox"
                               class="switcher-input"
                               id="publish"
                               name="publish"
                               {{ $post->is_published ? 'checked' : '' }}
                               wire:change="togglePublish($event.target.checked)"
                               wire:loading.attr="disabed"
                               wire:target="togglePublish">
                        <span class="switcher-indicator"></span>
                    </label>
                    <label for="publish">Publish</label>
                </div>
            @endcan

            <div class="body" v-pre>
                {{ nl2br($post->description) }}
            </div>
        </div>
    </div>
</article>
