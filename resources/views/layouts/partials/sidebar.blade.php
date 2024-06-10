<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link logo-switch">
    <img src="{{ url('/assets/img/logo-xs.png') }}" alt="AdminLTE Docs Logo Small" class="brand-image-xl logo-xs">
    <img src="{{ url('/assets/img/logo-xl.png') }}" alt="AdminLTE Docs Logo Large" class="brand-image-xs logo-xl"
      style="left: 12px">

  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ url('/assets/img/logo-xs.png') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">CTA</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>

        {{-- @foreach ($this->menuLinks as $component => $permissions)
        <li class="nav-item menu-open">
          <a href="#" class="nav-link #active">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              {{__($component.'._component_menu_links_')}}
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">{{count($permissions)}}</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            @foreach ($permissions as $perm)
            <li class="nav-item">
              <a href="#" wire:click="@goTo({{$component}}, {{$perm->view_mode}})" class="nav-link #active">
                <i class="far fa-circle nav-icon"></i>
                <p>{{__($component.'._'.$perm->view_mode.'_menu_link_')}}</p>
              </a>
            </li>
            @endforeach
           </ul>
        </li>
        @endforeach --}}

        <li class="nav-header">Others</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Calendar
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
