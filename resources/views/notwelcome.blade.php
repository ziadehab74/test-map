 @extends('layouts.admin')

 @section('content')

 @livewire('acme-crud-orchestrator')

{{-- <nav width="100%">
    <a href="{{url('counter')}}" wire:navigate>Counter</a>
    <a href="{{url('user')}}" wire:navigate>User</a>
    <a href="{{url('livewire')}}" wire:navigate>Livewire</a>
</nav> --}}
<br /><br />
<div class="card">
    <div class="card-body">
        <h6>https://laravel-package-ocean.com/</h6>
        <h6>https://github.com/livewire/livewire</h6>
        <h6>https://github.com/barryvdh/laravel-debugbar</h6>
        <h6>https://github.com/PHP-CS-Fixer/PHP-CS-Fixer</h6>
        <h6>https://github.com/spatie/laravel-permission</h6>
        <h6>https://github.com/jenssegers/laravel-mongodb</h6>
        <h6>https://github.com/yajra/laravel-datatables</h6>
    </div>
</div>

 @endsection
