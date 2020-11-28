<div class="app-alerts">
    @if(session()->has('message'))
    <p class="alert alert-success text-center">{{ session('message') }}</p>
    @endif

    @if(session()->has('error') || ($errors->count() && $errors->has('error')))
    <p class="alert alert-danger text-center">{{ session('error') ?? $errors->first('error') ?? '' }}</p>
    @endif
</div>
