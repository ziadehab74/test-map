<div>
    @if (session('_success_'))
    <div class="alert alert-success" role="alert">
        <strong>Alert Heading</strong> {{session('_success_')}}
    </div>
    @endif
    @if (session('_error_'))
    <div class="alert alert-danger" role="alert">
        <strong>Alert Heading</strong> {{session('_error_')}}
    </div>
    @endif
    <div wire:loading>
        <div class="spinner-border text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div wire:offline>
        You are offline
    </div>

    <div wire:loading.class="opacity-50">
        @yield('component')
    </div>
</div>
