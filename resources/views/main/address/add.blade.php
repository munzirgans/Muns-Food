@extends("main.layouts.master")
@section("title", "Address")
@section("content")
    <div class="container">
        <h2 class="text-center font-weight-bold" style="margin-top:80px;">Tambahkan Address Anda</h2>
        <form action="{{route('address.store')}}" method="POST">
            @csrf
            <div class="form-group col-6" style="margin-top:40px;">
                <label for="address">Address</label>
                <textarea name="address" id="address" cols="30" rows="8" placeholder="Address" class="form-control"></textarea>
            </div>
            <button class="btn btn-success" style="margin-left:14px;">Submit</button>
            <a href="{{route('address')}}" class="btn btn-light">Cancel</a>
            <div style="margin-bottom:290px;"></div>
        </form>
    </div>

@endsection
