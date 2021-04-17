@extends("main.layouts.master")
@section("title", "Profile")
@section("content")
    <div class="container">
        <h2 class="text-center font-weight-bold" style="margin-top:80px;">Profile Anda</h2>
        <form action="{{route('profile.update')}}" method="POST">
            @csrf
            <div class="form-group col-3" style="margin-top:20px;">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" value="{{$user->username}}" placeholder="Username" name="username">
            </div>
            <div class="form-group col-3">
                <label for="email">Email</label>
                <input type="Email" class="form-control" id="email" value="{{$user->email}}" placeholder="Email" name="email">
            </div>
            <div class="form-group col-3">
                <label for="handphone">Handphone</label>
                <input type="text" class="form-control" id="handphone" value="{{$user->handphone}}" placeholder="Handphone" name="handphone">
            </div>
            <div class="form-group col-3">
                <label for="address">Address</label>
                <a href="{{route('address')}}" class="btn btn-primary form-control">Edit Your Address</a>
            </div>
            <button class="btn btn-success" style="margin-left:14px;">Submit</button>
            <a href="{{route('home')}}" class="btn btn-light">Cancel</a>
        </form>
    </div>

@endsection
