<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Muns Food</title>
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('assets/css/font.css')}}">
    <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>
<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg" style="margin-top:100px;box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px !important;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background : url('{{asset('assets/images/restaurant.jpeg')}}'); background-size:cover;background-position:center;"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4 mt-5">Welcome Back !</h1>
                                    </div>
                                    <form class="user" method="post" action="">
                                        @csrf

                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Email Address" name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <button href="" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                        <a class="small" href="{{route('register.index')}}">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}"></script>
    <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}"></script>
    <script src="{{asset('assets/js/sb-admin-2.min.js')}"></script>
</body>
</html>
