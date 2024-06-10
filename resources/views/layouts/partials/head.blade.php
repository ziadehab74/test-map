<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  {{-- {% seo %} --}}

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}


  <link href="{{url('bootstrap-5.3.2-dist/css/bootstrap.min.css')}}" rel="stylesheet">
  {{--
  <link href="{{url('bootstrap-5.3.2-dist/css/bootstrap.rtl.min.css')}}" rel="stylesheet"> --}}
  <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets/css/docs.css') }}">
  <link rel="stylesheet" href="{{ url('assets/css/highlighter.css') }}">
  <link rel="stylesheet" href="{{ url('assets/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets/plugins/sweetalert2/sweetalert2.min.css') }}">

  @if(app()->getLocale() == 'ar')
  <link rel="stylesheet" href="{{ url('assets/css/adminlte-rtl.min.css') }}">
  @else
  <link rel="stylesheet" href="{{ url('assets/css/adminlte.min.css') }}">
  @endif
  {{--
  <link rel="stylesheet" href="{{ url('assets/css/custom.css') }}"> --}}

  {{--
  <link rel="stylesheet" href="{{ url('assets/css/adminlte.rtl.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets/css/adminlte.rtl-custom.css') }}"> --}}
  @livewireStyles
  @yield('styles')

</head>
