@extends("main.layouts.master")
@section("title", "Cart")
@section("content")
    <div class="container">
        <h2 class="text-center font-weight-bold" style="margin-top:80px;">Edit Quantity Produk Anda</h2>
        <div class="col-3"style="margin-bottom:260px;">
            @if($errors->any())
                <div style="margin-bottom:20px;margin-top:10px;">
                    @foreach($errors->all() as $e)
                        <li style="font-size:13px;margin-bottom:10px;" class="text-danger">{{$e}}</li>
                    @endforeach
                </div>
            @endif
        <form action="{{route('cart.update',$c->id)}}" method="POST">
            @csrf
            <div class="form-group" style="margin-top:50px;">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" value="{{$c->quantity}}">
            </div>
            <button class="btn btn-success">Submit</button>
            <a href="{{route('cart')}}" class="btn btn-light">Cancel</a>
        </form>
        </div>
    </div>
@endsection
