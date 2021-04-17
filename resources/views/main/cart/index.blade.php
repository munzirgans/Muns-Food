@extends("main.layouts.master")
@section('title', "Keranjang Anda")
@section("content")
    <div class="container">
        <h2 class="text-center font-weight-bold" style="margin-top:80px;margin-bottom:50px;">Keranjang Anda</h2>
        <table class="table table-striped">
            <thead>
                <th>#</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach($cart as $c)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$c->product->name}}</td>
                        <td>{{$c->quantity}}</td>
                        <td>{{$c->total_price}}</td>
                        <td>
                            <a href="{{route('cart.edit',$c->id)}}" class="btn btn-warning">Edit</a>
                            <a href="{{route('cart.delete', $c->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h5 class="font-weight-bold" style="margin-top:120px;">Total Harga : {{$total_price}}</h5>
        <a class="btn btn-success" style="margin-top:10px;" href="{{route('order')}}">Checkout</a>
    </div>
@endsection
