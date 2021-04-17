<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Register | Muns Food</title>
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/font.css')}}">
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg" style="margin-top:100px;margin-bottom:100px;box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px !important;">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block" style="background:url({{asset('assets/images/restaurant-2.jpg')}}); background-size:cover;background-position:center;"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create User Account !</h1>
                            </div>
                            <form class="user" method="POST" action="{{route('register.register')}}">
                                @csrf
                                @if($errors->any())
                                    <div style="margin-bottom:20px;margin-top:10px;">
                                        @foreach($errors->all() as $error)
                                            <li style="font-size:13px;margin-bottom:10px;" class="text-danger">{{$error}}</li>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="Fullname"
                                        placeholder="Username" name="username">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Handphone" name="handphone">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name="password_confirmation">
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{route('login.index')}}">Already have an account? Login !</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>

</body>

</html>
