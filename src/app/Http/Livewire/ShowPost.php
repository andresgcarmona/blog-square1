<?php

    namespace App\Http\Livewire;

    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use Livewire\Component;

    class ShowPost extends Component
    {
        use AuthorizesRequests;

        public $post;

        public function render()
        {
            return view('livewire.show-post');
        }

        public function togglePublish($checked)
        {
            $this->authorize('publish', $this->post);

            $this->post->update(['published_at' => $checked ? now() : null]);

            $this->post->fresh();

            $this->emit('togglePublished', __('Post '.($this->post->is_published ? 'published' : 'unpublished').' successfully.'));
        }
    }
