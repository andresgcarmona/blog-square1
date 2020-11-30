<div class="form-group mb-4">
    <label for="title"
           class="d-block font-weight-bold">Post title: </label>
    <input type="text"
           name="title"
           id="title"
           placeholder="Post title"
           autofocus
           required
           class="form-control {{ $errors->has('title') ? 'border-danger' : '' }}"
           value="{{ old('title', $post->title) }}"/>
    @error('title')
    <p class="text-danger font-weight-bold mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="form-group mb-4">
    <label for="description"
           class="d-block font-weight-bold">Description: </label>
    <textarea name="description"
              id="description"
              placeholder="Enter a short description"
              rows="5"
              cols="5"
              required
              class="form-control {{ $errors->has('description') ? 'border-danger' : '' }}">{{ old('description', $post->description) }}</textarea>
    @error('description')
    <p class="text-danger font-weight-bold mt-1">{{ $message }}</p>
    @enderror
</div>

<div class="form-group mb-4">
    <label class="switcher-control switcher-control-lg">
        <input type="checkbox"
               class="switcher-input"
               id="publish"
               name="publish"
                {{ $post->is_published ? 'checked' : '' }}>
        <span class="switcher-indicator"></span>
    </label>
    <label for="publish"
           class="d-inline-block font-weight-bold">Publish? </label>
</div>

<div class="form-group mb-4 d-flex justify-content-end">
    <button type="submit" class="btn btn-primary mr-2">{{ __('Update post') }}</button>
    <button type="button" class="btn btn-secondary">{{ __('Cancel') }}</button>
</div>
