<!DOCTYPE html>
<html lang="en">

@include('layouts.partials.head')

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
    <div class="wrapper">
        @include('layouts.partials.preloader')
        @include('layouts.partials.navbar')
        {{-- --}}
        @livewire('sidebar')
        {{-- --}}
        <div class="content-wrapper px-4 py-2" style="min-height: 141px;">
            @yield('content')
        </div>
        {{-- --}}
        @include('layouts.partials.control-sidebar')
        @include('layouts.partials.footer')
    </div>
    @include('layouts.partials.foot')
</body>

</html>
