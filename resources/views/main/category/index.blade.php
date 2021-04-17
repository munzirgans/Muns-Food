@extends("main.layouts.master")
@section("title", "Category")
@section("content")
    <div class="container">
        <h2 class="text-center font-weight-bold" style="margin-top:50px;margin-bottom:40px;">{{$category->category}}</h2>
        <div class="row justify-content-center" style="margin-top:20px;margin-bottom:20px;">
            @foreach($category->product as $p)
                <div class="col-3">
                    <a href="{{route('product', $p->id)}}" style="text-decoration:none;color:black;">
                    <div class="card shadow" style="overflow:hidden;border-radius:10px">
                        <img src="{{asset('assets/images/products/'.$p->photo)}}" class="card-img-top" alt="" style="height:150px;">
                        <div class="card-body">
                            <h5 class="text-center font-weight-bold">{{$p->name}}</h5>
                            <p class="card-text" style="margin-top:10px;">{{$p->description}}</p>
                        </div>
                    </div>
                </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
