<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Muns Food</title>
    @include("main.layouts.dev.link")
    <style>
        li.nav-item a{
            font-size:17px;
        }
        li.nav-item{
            margin-left:10px;
        }
    </style>
    @yield('style')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
    <div class="container">
        <a class="navbar-brand font-weight-bold" href="{{route('home')}}" style="font-size:23px;">Muns Food</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item {{Request::segment(1) == '' || Request::segment(1) == 'category' ? 'active' : ''}}">
                <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item {{Request::segment(1) == 'menu' || Request::segment(1) == 'product' ? 'active' : ''}}">
                <a class="nav-link" href="{{route('menu')}}">Menu</a>
            </li>
            <li class="nav-item {{Request::segment(1) == 'cart' || Request::segment(1) == 'order' ? 'active' : ''}}">
                @if(Session::has("user"))
                <a class="nav-link" href="{{route('cart')}}">Cart <sup><span class="badge badge-dark" style="font-size:10px;">{{count(\App\Cart::where("user_id", \Session::get("user")->id)->get())}}</span></sup></a>
                @else
                    <a class="nav-link" href="{{route('cart')}}">Cart <sup><span class="badge badge-dark" style="font-size:10px;">0</span></sup></a>
                @endif
            </li>
            <li class="nav-item {{Request::segment(1) == 'orders' ? 'active' : ''}}">
                <a href="{{route('orders')}}" class="nav-link">Order</a>
            </li>
            <li class="nav-item {{Request::segment(1) == 'profile' ? 'active' : ''}}">
                <a href="{{route('profile')}}" class="nav-link">Profile</a>
            </li>
            @if(\Session::has("user"))
            <li class="nav-item dropdown" style="margin-left:50px;">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{\App\User::find(\Session::get('user')->id)->username}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('login.logout')}}">Logout</a>
                </div>
            </li>
            @else
                <li class="nav-item" style="margin-left:50px;">
                    <a class="nav-link" href="{{route('login.index')}}">Sign In</a>
                </li>
            @endif
            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Cart
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li> -->

            </ul>
        </div>
    </div>
    </nav>
    @yield('content')
    <footer class="bg-primary" style="padding-top:20px;padding-bottom:20px;margin-top:130px;">
        <div class="container">
            <p class="text-light font-weight-bold" style="margin-bottom:0px;">Copyright &copy; Muns Food All Right Reserved.</p>
        </div>
    </footer>
    @include("main.layouts.dev.script")
    @yield("script")
</body>
</html>
