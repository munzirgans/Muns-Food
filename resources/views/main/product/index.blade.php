@extends("main.layouts.master")
@section("title", "Product")
@section("content")
    <div class="container">
        <h2 class="text-center font-weight-bold" style="margin-top:50px;">Detail Produk</h2>
        <div class="card shadow" style="margin-top:60px;border-radius:15px;overflow:hidden;">
            <div class="row">
                <div class="col-5">
                    <img src="{{asset('assets/images/products/'.$product->photo)}}" alt="" style="width:100%;height:100%">
                </div>
                <div class="col-7" style="margin-bottom:50px;">
                    <div class="card-body">
                        <h3 class="font-weight-bold">{{$product->name}}</h3>
                        <div style="display:flex" class="star">
                                @if($product->star == 5)
                                    @for($i=0;$i < $product->star;$i++)
                                        <i class="fas fa-star" style="color:#fdb827"></i>
                                    @endfor
                                @else
                                    @for($i=0;$i < $product->star;$i++)
                                        <i class="fas fa-star" style="color:#fdb827"></i>
                                    @endfor
                                    @for($i=0;$i < 5 - $product->star;$i++)
                                        <i class="far fa-star" style="color:#fdb827"></i>
                                    @endfor
                                @endif
                            </div>
                        <p class="text-title" style="margin-top:20px;">{{$product->description}}</p>
                        <p>Stock : {{$product->stock}}</p>
                        <p>Price : {{$product->price}}</p>
                        <form action="{{route('cart.store')}}" method="POST">
                            @csrf
                            <div style="float:right;margin-right:20px;">
                                <h5>Buy Quantity : </h5>
                                <input type="hidden" name="product_id" value="{{Request::segment(2)}}">
                                <input type="number" value="1" name="quantity" class="form-control">
                                <button class="btn btn-success" style="margin-top:10px;width:100%;">Masukkan ke Keranjang</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
