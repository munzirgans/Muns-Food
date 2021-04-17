@extends("main.layouts.master")
@section("title", "Menu")
@section("content")
    <div class="container">
        <h2 class="text-center font-weight-bold" style="margin-top:50px;margin-bottom:30px;">All Menu</h2>
        @foreach($category as $c)
            <h4 class="font-weight-bold">{{$c->category}}</h4>
            <div class="row" style="margin-top:20px;margin-bottom:30px;">
            @foreach($c->product as $c2)
                <div class="col-3">
                    <a href="{{route('product', $c2->id)}}" style="text-decoration:none;">
                        <div class="card shadow" style="overflow:hidden;border-radius:10px">
                            <img src="{{asset('assets/images/products/'.$c2->photo)}}" class="card-img-top" alt="" style="height:150px;">
                            <div class="card-body">
                                <h4 class="card-title text-center" style="color:black;">{{$c2->name}}</h4>
                                <p class="card-text" style="color:black; font-size:15px;margin-top:10px;">{{$c2->description}}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            </div>
        @endforeach
    </div>

@endsection
