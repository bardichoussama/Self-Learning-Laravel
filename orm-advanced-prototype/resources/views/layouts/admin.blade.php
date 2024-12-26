<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <div class="app-wrapper">
            <!--begin::Header-->
            <nav class="app-header navbar navbar-expand bg-body">
              <!--begin::Container-->
              <div class="container-fluid">
                <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                      <i class="bi bi-list"></i>
                    </a>
                  </li>
       
                </ul>
                <!--end::Start Navbar Links-->
                <!--begin::End Navbar Links-->
                <ul class="navbar-nav ms-auto">
                  <!--begin::Navbar Search-->
                  <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                      <i class="bi bi-search"></i>
                    </a>
                  </li>
                  <!--end::Navbar Search-->
                  <!--begin::Messages Dropdown Menu-->
                  <li class="nav-item dropdown">
                    <a class="nav-link" data-bs-toggle="dropdown" href="#">
                      <i class="bi bi-chat-text"></i>
                      <span class="navbar-badge badge text-bg-danger">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                      <a href="#" class="dropdown-item">
                        <!--begin::Message-->
                        <div class="d-flex">
                          <div class="flex-shrink-0">
                            <img
                              src="../../../dist/assets/img/user1-128x128.jpg"
                              alt="User Avatar"
                              class="img-size-50 rounded-circle me-3"
                            />
                          </div>
                          <div class="flex-grow-1">
                            <h3 class="dropdown-item-title">
                              Brad Diesel
                              <span class="float-end fs-7 text-danger"
                                ><i class="bi bi-star-fill"></i
                              ></span>
                            </h3>
                            <p class="fs-7">Call me whenever you can...</p>
                            <p class="fs-7 text-secondary">
                              <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                            </p>
                          </div>
                        </div>
                        <!--end::Message-->
                      </a>
                      <div class="dropdown-divider"></div>
                     
                    
                    </div>
                  </li>
                  <!--end::Messages Dropdown Menu-->
                  <!--begin::Notifications Dropdown Menu-->
                
                  <!--end::Notifications Dropdown Menu-->
                  <!--begin::Fullscreen Toggle-->
                  <li class="nav-item">
                    <a class="nav-link" href="#" data-lte-toggle="fullscreen">
                      <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
                      <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
                    </a>
                  </li>
                  <!--end::Fullscreen Toggle-->
                  <!--begin::User Menu Dropdown-->
                  <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                      <img
                        src="../../../dist/assets/img/user2-160x160.jpg"
                        class="user-image rounded-circle shadow"
                        alt="User Image"
                      />
                      <span class="d-none d-md-inline">    {{ auth()->user()->name}}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                      <!--begin::User Image-->
                      <li class="user-header text-bg-primary">
                        <img
                          src="../../../dist/assets/img/user2-160x160.jpg"
                          class="rounded-circle shadow"
                          alt="User Image"
                        />
                        <p>
                          {{ auth()->user()->name}}
                          <small>Member since Nov. 2023</small>
                        </p>
                      </li>
                      <!--end::User Image-->
                      <!--begin::Menu Body-->
                      <li class="user-body">
                        <!--begin::Row-->
                        
                        <!--end::Row-->
                      </li>
                      <!--end::Menu Body-->
                      <!--begin::Menu Footer-->
                      <li class="user-footer">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                     
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-default btn-flat float-end">Sign out</button>
                        </form>
                    
                      </li>
                      <!--end::Menu Footer-->
                    </ul>
                  </li>
                  <!--end::User Menu Dropdown-->
                </ul>
                <!--end::End Navbar Links-->
              </div>
              <!--end::Container-->
            </nav>
            <!--end::Header-->
            <!--begin::Sidebar-->
            <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
              <!--begin::Sidebar Brand-->
              <div class="sidebar-brand">
                <!--begin::Brand Link-->
                <a href="../index.html" class="brand-link">
                  <!--begin::Brand Image-->
                  <img
                    src="../../../dist/assets/img/AdminLTELogo.png"
                    alt="AdminLTE Logo"
                    class="brand-image opacity-75 shadow"
                  />
                  <!--end::Brand Image-->
                  <!--begin::Brand Text-->
                  <span class="brand-text fw-light">AdminLTE 4</span>
                  <!--end::Brand Text-->
                </a>
                <!--end::Brand Link-->
              </div>
              <!--end::Sidebar Brand-->
              <!--begin::Sidebar Wrapper-->
              <div class="sidebar-wrapper">
                <nav class="mt-2">
                  <!--begin::Sidebar Menu-->
                  <ul
                    class="nav sidebar-menu flex-column"
                    data-lte-toggle="treeview"
                    role="menu"
                    data-accordion="false"
                  >
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                          Dashboard
                          <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="../index.html" class="nav-link">
                            <i class="nav-icon bi bi-circle"></i>
                            <p>Dashboard v1</p>
                          </a>
                        </li>
                       
                      </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('article.create')}}" class="nav-link">
                          <i class="nav-icon bi bi-palette"></i>
                          <p>Create Article</p>
                        </a>
                      </li>                    
                  </ul>
                  <!--end::Sidebar Menu-->
                </nav>
              </div>
              <!--end::Sidebar Wrapper-->
            </aside>
            <!--end::Sidebar-->
            <!--begin::App Main-->
            <main class="py-4">
                @yield('content')
            </main>
            <!--end::App Main-->
            <!--begin::Footer-->
            <footer class="app-footer">
              <!--begin::To the end-->
              <div class="float-end d-none d-sm-inline">Anything you want</div>
              <!--end::To the end-->
              <!--begin::Copyright-->
              <strong>
                Copyright &copy; 2014-2024&nbsp;
                <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
              </strong>
              All rights reserved.
              <!--end::Copyright-->
            </footer>
            <!--end::Footer-->
          </div>
       

       
    </div>
</body>
</html>
