@extends('layout.admin.admin')
@section('content')
    <div class="card"> 
        <div class="card-body">
            <div class="card-title">         
                Add Category
            </div>
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter Name Product">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" class="form-control" placeholder="Enter Name Product">
                </div>
                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control" placeholder="Enter Name Product">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="dsc" class="form-control" placeholder="Enter Name Product">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>    
@endsection