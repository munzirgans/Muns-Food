@extends("main.layouts.master")
@section("title", "Beranda")
@section("style")
    <style>
        .category:hover{
            text-decoration:none;
        }
    </style>
@endsection
@section("content")
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Welcome to Muns Food !</h1>
            <p class="lead">At muns food, you can buy food easily and quickly</p>
            <hr class="my-4">
            <p>To see the menu list, you can click the button below.</p>
            <a class="btn btn-primary btn-lg" href="{{route('menu')}}" role="button">Menu</a>
        </div>
    </div>
    <div class="container">
        <h3 class="text-center font-weight-bold" style="margin-bottom:40px;margin-top:50px;">Category</h3>
        <div class="row justify-content-center">
        @foreach($category as $c)
                <div class="col-3">
                    <a href="{{route('category',$c->id)}}" class="category">
                        <div class="card shadow" style="overflow:hidden;border-radius:10px">
                            <img src="{{asset('assets/images/category/'.$c->photo)}}" class="card-img-top" alt="" style="height:200px;">
                            <div class="card-body">
                                <h4 class="card-title text-center " style="color:black;">{{$c->category}}</h4>
                            </div>
                        </div>
                    </a>
                </div>
        @endforeach
        </div>
    </div>
@endsection
