@extends("admin.layouts.master")
@section("title", "Order")
@section("content")
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order Detail</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row" style="justify-content:space-between;">
                <h6 class="m-0 font-weight-bold text-primary" style="margin-left:15px !important;align-items:center;display:flex;">Product Detail</h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order as $o)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$o->product->name}}</td>
                                <td>{{$o->quantity}}</td>
                                <td>{{$o->total_price}}</td>
                            </tr>
                        @endforeach
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Delivery Address</label>
                    <textarea id="" cols="30" rows="5" disabled class="form-control">{{$order2->address}}</textarea>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Method Payment</label>
                    <input type="text" class="form-control" disabled value="{{$order2->method}}">
                </div>
            </div>
            <form action="{{route('admin.order.selected')}}" method="POST">
                @csrf
                <input type="hidden" value="{{$order2->datetime}}" name="datetime">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Choose Courier</label>
                    <select name="courier_id" id="" name="courier_id" class="form-control">
                        <option value="0" selected disabled>Select Courier</option>
                        @foreach($courier as $c)
                            <option value="{{$c->id}}">{{$c->username}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button class="btn btn-primary">Accept</button>
            <a href="" class="btn btn-cancel">Cancel</a>
            </form>
        </div>
    </div>
@endsection
