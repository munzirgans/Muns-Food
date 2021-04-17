<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Admin Panel</title>
    @include('admin.layouts.dev.link')
</head>
<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-hamburger"></i>
                </div>
                <div class="sidebar-brand-text mx-3" style="font-size:14px;">Muns Food</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class='nav-item {{Request::segment(1) == "admin" && count(Request::segments()) == 1 ? "active" : "" }}'>
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Configuration</div>
            <li class="nav-item {{Request::segment(2) == 'category' ? 'active' : ''}}">
                <a href="{{route('admin.category')}}" class="nav-link">
                    <i class="fas fa-th"></i>
                    <span>Category</span>
                </a>
            </li>
            <li class="nav-item {{Request::segment(2) == 'vendor' ? 'active' : ''}}">
                <a href="{{route('admin.vendor')}}" class="nav-link">
                    <i class="fas fa-biking"></i>
                    <span>Vendor</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Manage
            </div>
            <li class="nav-item {{Request::segment(2) == 'product' ? 'active' : ''}}" >
                <a class="nav-link" href="{{route('admin.product')}}">
                    <i class="fas fa-pizza-slice"></i>
                    <span>Manage Products</span>
                </a>
            </li>
            <li class="nav-item {{Request::segment(2) == 'order' ? 'active' : ''}}" >
                <a class="nav-link" href="{{route('admin.order')}}">
                    <i class="fas fa-tasks"></i>
                    <span>Manage Order</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                user
            </div>
            <li class="nav-item {{Request::segment(2) == 'courier' ? 'active' : ''}}">
                <a href="{{route('admin.courier')}}" class="nav-link">
                    <i class="fas fa-users"></i>
                    <span>Courier</span>
                </a>
            </li>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <h4 class="ml-auto mr-auto font-weight-bold text-primary">Muns Food Admin Panel</h4>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{\Session::get("user")->username}}</span>
                                <img class="img-profile rounded-circle" src="{{asset('assets/images/users/'.\Session::get('user')->photo)}}">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('login.logout')}}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include('admin.layouts.dev.script')
</body>
</html>
