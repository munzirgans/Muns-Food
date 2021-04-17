@extends("admin.layouts.master")
@section("title", "Product")
@section("content")
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Product</h1>
</div>
<div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row" style="justify-content:space-between;">
                <h6 class="m-0 font-weight-bold text-primary" style="margin-left:15px !important;align-items:center;display:flex;">Product Data</h6>
                <a href="{{route('admin.product.add')}}" class="btn btn-success"> <i class="fas fa-plus" style="margin-right:5px;"></i> Add Product</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Star</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($product as $p)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    <img src="{{asset('assets/images/products/'.$p->photo)}}" alt="" style="width:80px; height:80px; display:block; margin-right:auto; margin-left:auto; border-radius:5px">
                                </td>
                                <td>{{$p->name}}</td>
                                <td>{{$p->description}}</td>
                                <td>{{$p->category}}</td>
                                <td>{{$p->stock}}</td>
                                <td>{{$p->price}}</td>
                                <td>{{$p->star}}</td>
                                <td>
                                    <a href="{{route('admin.product.edit', $p->id)}}" class="btn btn-warning">Edit</a>
                                    <a href="{{route('admin.product.delete', $p->id)}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
