@extends("admin.layouts.master")
@section("title", "Courier")
@section("content")
@if(count($vendor))
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Courier</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            @if($errors->any())
                <div style="margin-bottom:20px;margin-top:10px;">
                    @foreach($errors->all() as $e)
                        <li style="font-size:13px;margin-bottom:10px;" class="text-danger">{{$e}}</li>
                    @endforeach
                </div>
            @endif
            <form action="{{route('admin.courier.update', $c->id)}}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" class="form-control" id="photo">
                </div>
                <div class="form-group">
                    <label for="name">Username</label>
                    <input type="text" name="username" class="form-control" id="name" placeholder="Username" value="{{$c->username}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="{{$c->email}}">
                </div>
                <div class="form-group">
                    <label for="handphone">Handphone</label>
                    <input type="text" name="handphone" class="form-control" id="handphone" placeholder="Handphone" value="{{$c->handphone}}">
                </div>
                <div class="form-group">
                    <label for="vendor">Vendor</label>
                    <select name="vendor_id" id="vendor" class="form-control">
                        <option value="0" selected>Select Vendor</option>
                        @foreach($vendor as $v)
                            @if($c->vendor_id == $v->id)
                                <option value="{{$v->id}}" selected>{{$v->vendor}}</option>
                            @else
                                <option value="{{$v->id}}">{{$v->vendor}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password">
                </div>
                <button class="btn btn-primary">Submit</button>
                <a href="{{route('admin.courier')}}" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
@else
    <h3 class="text-danger">You cant add courier because vendor is empty. Please add some vendor first !</h3>
@endif
@endsection
