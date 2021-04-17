@extends("admin.layouts.master")
@section("title", "Courier")
@section("content")
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Courier</h1>
</div>
<div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row" style="justify-content:space-between;">
                <h6 class="m-0 font-weight-bold text-primary" style="margin-left:15px !important;align-items:center;display:flex;">Courier Data</h6>
                <a href="{{route('admin.courier.add')}}" class="btn btn-success"> <i class="fas fa-plus" style="margin-right:5px;"></i> Add Courier</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Handphone</th>
                            <th>Vendor</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courier as $c)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <img src="{{asset('assets/images/users/courier/'.$c->photo)}}" alt="" style="width:80px;height:80px;display:block;margin-left:auto;margin-right:auto;border-radius:5px;">
                                </td>
                                <td>{{$c->username}}</td>
                                <td>{{$c->email}}</td>
                                <td>{{$c->handphone}}</td>
                                <td>{{$c->vendor}}</td>
                                <td>
                                    <a href="{{route('admin.courier.edit', $c->id)}}" class="btn btn-warning">Edit</a>
                                    <a href="{{route('admin.courier.delete', $c->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
