@extends("main.layouts.master")
@section("title", "Order")
@section("content")
    <div class="container">
        <h2 class="text-center font-weight-bold" style="margin-top:80px;">Buat Pesanan</h2>
        <div class="col-12">
            <table class="table table-striped" style="margin-top:50px;">
                <thead>
                    <th>#</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </thead>
                <tbody>
                    @foreach($cart as $c)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$c->product->name}}</td>
                            <td>{{$c->quantity}}</td>
                            <td>{{$c->total_price}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h6 style="margin-top:50px;">Total Harga : {{$total_price}}</h6>
        </div>
        <form action="{{route('orders.order')}}" method="POST">
            @csrf
            <div class="col-3">
            <h5 class="font-weight-bold" style="margin-top:30px;">Pilih Alamat Pengiriman</h5>
                <select name="address_id" class="form-control" style="margin-top:15px;">
                    <option value="0" selected disabled>Pilih Alamat Pengiriman</option>
                    @foreach($address as $a)
                        <option value="{{$a->id}}">{{$a->address}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <h5 class="font-weight-bold" style="margin-top:30px;">Pilih Pengiriman</h5>
                <select name="vendor_id" class="form-control" style="margin-top:15px;">
                    <option value="0" selected disabled>Pilih Pengiriman</option>
                    @foreach($vendor as $v)
                        <option value="{{$v->id}}">{{$v->vendor}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <h5 class="font-weight-bold" style="margin-top:30px;">Pilih Metode Pembayaran</h5>
                <select name="method_id" class="form-control" style="margin-top:15px;">
                    <option value="0" selected disabled>Pilih Metode Pembayaran</option>
                    @foreach($method as $m)
                        <option value="{{$m->id}}">{{$m->method}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3" style="margin-top:30px;">
            <button class="btn btn-success">Pesan</button>
            <a href="{{route('cart')}}" class="btn btn-light">Cancel</a>
            </div>
        </form>
    </div>
@endsection
