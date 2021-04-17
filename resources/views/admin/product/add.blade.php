@extends("admin.layouts.master")
@section("title", "Product")
@section("content")
@if(count($category))
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Add Product</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            @if($errors->any())
                <div style="margin-bottom:20px;margin-top:10px;">
                    @foreach($errors->all() as $e)
                        <li style="font-size:13px;margin-bottom:10px;" class="text-danger">{{$e}}</li>
                    @endforeach
                </div>
            @endif
            <form action="{{route('admin.product.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" class="form-control" id="photo">
                </div>
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Product Name">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="7" name="description" placeholder="Description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_id" id="category" class="form-control">
                        <option value="0" disabled selected>Select Category</option>
                        @foreach($category as $c)
                            <option value="{{$c->id}}">{{$c->category}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" class="form-control" id="stock" placeholder="Stock">
                </div>
                <div class="form-group">
                    <label for="stock">Price</label>
                    <input type="number" name="price" class="form-control" id="price" placeholder="Price">
                </div>
                <div class="form-group">
                    <label for="star">Star</label>
                    <input type="number" name="star" class="form-control" id="star" placeholder="Star">
                </div>
                <button class="btn btn-primary">Submit</button>
                <a href="{{route('admin.product')}}" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
@else
    <h3 class="text-danger">You cant add product because category is empty. Please add some category first !</h3>
@endif
@endsection
