@extends("admin.layouts.master")
@section("title", "Category")
@section("content")
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Category</h1>
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
            <form action="{{route('admin.category.update', $c->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" class="form-control" id="photo">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <input type="text" name="category" class="form-control" id="category" placeholder="Category" value="{{$c->category}}">
                </div>

                <button class="btn btn-primary">Submit</button>
                <a href="{{route('admin.category')}}" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
@endsection
