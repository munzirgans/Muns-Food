@extends("courier.layouts.master")
@section("title", "Dashboard")
@section("content")
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Courier</h1>
</div>
<div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row" style="justify-content:space-between;">
                <h6 class="m-0 font-weight-bold text-warning" style="margin-left:15px !important;align-items:center;display:flex;">Order List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order as $o)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$o->user->username}}</td>
                                    <td>{{$o->address->address}}</td>
                                    <td>
                                        <form action="{{route('courier.acc')}}" method="POST">
                                        @csrf
                                            <input type="hidden" value="{{$o->courier_id}}" name="courier_id">
                                            <input type="hidden" value="{{$o->datetime}}" name="datetime">
                                            <button class="btn btn-success"><i class="fas fa-check"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row" style="justify-content:space-between;">
                <h6 class="m-0 font-weight-bold text-success" style="margin-left:15px !important;align-items:center;display:flex;">Delivered List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order2 as $o)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$o->user->username}}</td>
                                    <td>{{$o->address->address}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
