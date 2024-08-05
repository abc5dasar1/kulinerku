@extends('layout.admin.admin')
@section('content')
    <div class="card"> 
        <div class="card-body">
            <div class="card-title">         
                Update Category
            </div>
            <form action="{{ route('product.update', $edit->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label>Name</label>
                    <input value="{{ $edit->name }}" type="text" name="name" class="form-control" placeholder="Enter Name Product">
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input value="{{ $edit->price }}" type="number" name="price" class="form-control" placeholder="Enter Name Product">
                </div>
                <div class="form-group">
                    <label>Photo</label>
                    <input value="{{ $edit->photo }}" type="file" name="photo" class="form-control" placeholder="Enter Name Product">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input value="{{ $edit->dsc }}" type="text" name="dsc" class="form-control" placeholder="Enter Name Product">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ url()->previous() }}" class="ml-2">Back</a>
            </form>
        </div>
    </div>    
@endsection