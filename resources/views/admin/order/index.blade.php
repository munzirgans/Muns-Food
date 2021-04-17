@extends("admin.layouts.master")
@section("title", "Orders")
@section("content")
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Order</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row" style="justify-content:space-between;">
            <h6 class="m-0 font-weight-bold text-warning" style="margin-left:15px !important;align-items:center;display:flex;">Proccess</h6>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Date & Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order as $o)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$o->user->username}}</td>
                            <td>{{$o->datetime}}</td>
                            <td>
                                <div class="d-flex">
                                    <form action="{{route('admin.order.detail')}}" method="POST">
                                        @csrf
                                        <button class="btn btn-success"><i class="fas fa-check"></i></button>
                                        <input type="hidden" name="datetime" value="{{$o->datetime}}">
                                    </form>
                                    <form action="{{route('admin.order.cancel')}}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger" style="margin-left:5px;"> <i class="fas fa-times"></i></button>
                                        <input type="hidden" name="datetime" value="{{$o->datetime}}">
                                    </form>
                            </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row" style="justify-content:space-between;">
            <h6 class="m-0 font-weight-bold text-info" style="margin-left:15px !important;align-items:center;display:flex;">Delivery</h6>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order2 as $o2)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$o2->user->username}}</td>
                            <td>{{$o2->datetime}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row" style="justify-content:space-between;">
            <h6 class="m-0 font-weight-bold text-danger" style="margin-left:15px !important;align-items:center;display:flex;">Canceled</h6>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Date & Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order3 as $o3)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$o3->user->username}}</td>
                            <td>{{$o3->datetime}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
