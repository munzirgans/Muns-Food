@extends("main.layouts.master")
@section("title", "Address")
@section("content")
    <div class="container">
        <h2 class="text-center font-weight-bold" style="margin-top:80px;">Alamat Anda</h2>
        <a href="{{route('address.add')}}" class="btn btn-success" style="float:right;margin-bottom:15px;margin-top:40px;">Add Address</a>
        <table class="table table-striped" style="margin-top:50px;margin-bottom:280px;">
            <thead>
                <th>#</th>
                <th>Address</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @foreach($address as $a)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$a->address}}</td>
                        <td>
                            <a href="{{route('address.edit', $a->id)}}" class="btn btn-warning">Edit</a>
                            <a href="{{route('address.delete', $a->id)}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
